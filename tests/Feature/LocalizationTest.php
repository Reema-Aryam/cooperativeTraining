<?php

namespace Tests\Feature;

use App\Http\Middleware\SetLocale;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Tests\TestCase;

class LocalizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_defaults_to_arabic_with_rtl_direction(): void
    {
        $this->get(route('home'))
            ->assertOk()
            ->assertSee('lang="ar" dir="rtl"', false)
            ->assertSee('بوابة التدريب التعاوني')
            ->assertSee('English');
    }

    public function test_language_switch_preserves_the_page_and_translates_subsequent_requests(): void
    {
        $this->post(route('language.switch', 'en'), ['return_to' => '/?view=opportunities#opportunities'])
            ->assertStatus(303)
            ->assertRedirect('/?view=opportunities')
            ->assertSessionHas('locale', 'en');

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('lang="en" dir="ltr"', false)
            ->assertSee('Cooperative Training Portal')
            ->assertSee('Health informatics')
            ->assertSee('6 months')
            ->assertSee('العربية')
            ->assertDontSee('بوابة التدريب التعاوني');

        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Log in to your account')
            ->assertSee('lang="en" dir="ltr"', false);

        $this->post(route('language.switch', 'ar'), ['return_to' => '/login'])
            ->assertRedirect('/login');

        $this->get(route('login'))
            ->assertSee('تسجيل الدخول إلى حسابك')
            ->assertSee('lang="ar" dir="rtl"', false);
    }

    public function test_unsupported_locales_cannot_be_selected(): void
    {
        $this->withSession(['locale' => 'ar'])
            ->post('/language/fr')
            ->assertNotFound()
            ->assertSessionHas('locale', 'ar');
    }

    public function test_invalid_saved_locale_falls_back_to_arabic(): void
    {
        $this->withSession(['locale' => ['en']])
            ->get(route('home'))
            ->assertOk()
            ->assertSee('lang="ar" dir="rtl"', false)
            ->assertSessionMissing('locale');
    }

    public function test_switch_cannot_redirect_to_external_or_malformed_destinations(): void
    {
        foreach (['https://example.org', '//example.org', '/\\example.org', '/%2fexample.org', '/%5cexample.org', "/\nexample.org", ['invalid']] as $destination) {
            $this->post('/language/en', ['return_to' => $destination])->assertRedirect('/');
        }
    }

    public function test_switch_preserves_encoded_search_parameters(): void
    {
        $this->post('/language/en', ['return_to' => '/?search=health%20informatics#opportunities'])
            ->assertRedirect('/?search=health%20informatics');
    }

    public function test_switch_discards_a_stale_faq_anchor_in_both_languages(): void
    {
        foreach (['en', 'ar'] as $locale) {
            $this->post('/language/'.$locale, ['return_to' => '/#faq'])
                ->assertStatus(303)
                ->assertRedirect('/')
                ->assertSessionHas('locale', $locale);
        }
    }

    public function test_validation_messages_follow_the_selected_language(): void
    {
        $this->withSession(['locale' => 'ar'])
            ->postJson(route('register.store'), ['name' => '', 'email' => 'invalid', 'password' => ''])
            ->assertUnprocessable()
            ->assertJsonPath('errors.name.0', 'حقل الاسم مطلوب.')
            ->assertJsonPath('errors.email.0', 'يجب أن يكون البريد الإلكتروني بريدًا إلكترونيًا صالحًا.');

        $this->withSession(['locale' => 'en'])
            ->postJson(route('register.store'), ['name' => '', 'email' => 'invalid', 'password' => ''])
            ->assertUnprocessable()
            ->assertJsonPath('errors.name.0', 'The name field is required.');
    }

    public function test_login_failure_is_localized(): void
    {
        $this->withSession(['locale' => 'ar'])
            ->postJson(route('login.store'), ['email' => 'missing@example.com', 'password' => 'incorrect'])
            ->assertUnprocessable()
            ->assertJsonPath('errors.email.0', 'بيانات الدخول غير مطابقة لسجلاتنا.');
    }

    public function test_authenticated_pages_and_livewire_validation_are_localized(): void
    {
        $this->actingAs(User::factory()->create());

        $this->withSession(['locale' => 'ar'])
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee('إعدادات الملف الشخصي')
            ->assertSee('lang="ar" dir="rtl"', false);

        Livewire::test('pages::settings.profile')
            ->set('name', '')
            ->call('updateProfileInformation')
            ->assertHasErrors(['name' => 'required'])
            ->assertSee('حقل الاسم مطلوب.');

        $this->withSession(['locale' => 'en'])
            ->get(route('profile.edit'))
            ->assertOk()
            ->assertSee('Profile settings')
            ->assertSee('lang="en" dir="ltr"', false);
    }

    public function test_livewire_update_route_includes_localization_middleware(): void
    {
        $routes = collect(Route::getRoutes()->getRoutes());
        $route = $routes->first(fn ($route) => str_ends_with($route->getName() ?? '', 'livewire.update'));

        $this->assertNotNull($route);
        $this->assertContains(SetLocale::class, Route::gatherRouteMiddleware($route));
    }

    public function test_translation_files_have_matching_keys_and_placeholders(): void
    {
        $arabic = json_decode(file_get_contents(lang_path('ar.json')), true, flags: JSON_THROW_ON_ERROR);
        $english = json_decode(file_get_contents(lang_path('en.json')), true, flags: JSON_THROW_ON_ERROR);

        $this->assertSame(array_keys($english), array_keys($arabic));

        foreach ($english as $key => $value) {
            preg_match_all('/:([a-zA-Z_]+)/', $value, $englishPlaceholders);
            preg_match_all('/:([a-zA-Z_]+)/', $arabic[$key], $arabicPlaceholders);
            $this->assertEqualsCanonicalizing($englishPlaceholders[0], $arabicPlaceholders[0], $key);
        }

        $this->assertSame(array_keys(require lang_path('en/site.php')), array_keys(require lang_path('ar/site.php')));
    }

    public function test_notification_emails_follow_the_current_language_and_direction(): void
    {
        $user = User::factory()->create();

        $this->withSession(['locale' => 'ar'])->get(route('home'));
        $arabic = (new ResetPassword('test-token'))->toMail($user)->render();

        $this->assertStringContainsString('dir="rtl"', (string) $arabic);
        $this->assertStringContainsString('إعادة تعيين كلمة المرور', (string) $arabic);
        $this->assertStringContainsString('بوابة التدريب التعاوني', (string) $arabic);

        $this->withSession(['locale' => 'en'])->get(route('home'));
        $english = (new VerifyEmail)->toMail($user)->render();

        $this->assertStringContainsString('dir="ltr"', (string) $english);
        $this->assertStringContainsString('Verify Email Address', (string) $english);
        $this->assertStringContainsString('Cooperative Training Portal', (string) $english);
    }
}
