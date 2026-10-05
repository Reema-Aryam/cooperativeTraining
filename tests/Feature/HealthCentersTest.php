<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HealthCentersTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_must_sign_in_to_view_the_directory(): void
    {
        $this->get(route('health-centers.index'))->assertRedirect(route('login'));
    }

    public function test_trainees_and_admins_can_access_the_directory_and_navigation(): void
    {
        foreach (['trainee', 'admin'] as $role) {
            $this->actingAs(User::factory()->create(['role' => $role]));
            $this->get(route('health-centers.index'))
                ->assertOk()
                ->assertViewHas('total', 46)
                ->assertSee('الغدير')
                ->assertSee('name="search"', false);

            $this->get(route('home'))
                ->assertOk()
                ->assertSee(route('health-centers.index'))
                ->assertDontSee('assembly-table', false)
                ->assertDontSee('الغدير');
        }
    }

    public function test_search_and_filters_are_combined_and_retained(): void
    {
        $this->actingAs(User::factory()->create());
        $this->get(route('health-centers.index', [
            'search' => '  الغدير  ', 'scope' => 'الأول', 'governorate' => 'الرياض',
        ]))->assertOk()
            ->assertViewHas('centers', fn ($centers) => $centers->count() === 1 && $centers->first()['name'] === 'الغدير')
            ->assertSee('value="الغدير"', false)
            ->assertSee('value="الأول" selected', false);

        $this->get(route('health-centers.index', ['search' => 'الغدير', 'scope' => 'الثاني']))
            ->assertOk()
            ->assertViewHas('centers', fn ($centers) => $centers->isEmpty())
            ->assertSee('لا توجد مراكز صحية تطابق');

        $this->get(route('health-centers.index'))
            ->assertOk()
            ->assertViewHas('centers', fn ($centers) => $centers->count() === 46);
    }

    public function test_directory_controls_follow_the_selected_language(): void
    {
        $this->actingAs(User::factory()->create())
            ->withSession(['locale' => 'en'])
            ->get(route('health-centers.index'))
            ->assertOk()
            ->assertSee('lang="en" dir="ltr"', false)
            ->assertSee('Health centers')
            ->assertSee('Search by center name');
    }
}
