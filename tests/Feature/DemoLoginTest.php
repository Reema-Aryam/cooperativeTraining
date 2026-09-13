<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DemoLoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_site_opens_the_login_page_first(): void
    {
        $this->get('/')->assertRedirect(route('login'));
        $this->get(route('login'))->assertOk();
    }

    public function test_demo_login_opens_home_without_submitting_or_validating_credentials(): void
    {
        config(['training.demo_login' => true]);

        $response = $this->get(route('login'))->assertOk();
        $document = new \DOMDocument;
        $document->loadHTML($response->getContent(), LIBXML_NOERROR | LIBXML_NOWARNING);
        $xpath = new \DOMXPath($document);
        $button = $xpath->query('//*[@data-test="login-button"]')->item(0);

        $this->assertSame('a', $button->nodeName);
        $this->assertSame(route('home'), $button->getAttribute('href'));
        $this->assertSame(0, $xpath->query('//form//input[@name="email" or @name="password"]')->length);
        $this->assertSame(0, $xpath->query('//input[@required]')->length);

        $this->get($button->getAttribute('href'))->assertOk()->assertViewIs('welcome');
        $this->assertGuest();
    }

    public function test_real_authentication_form_can_be_restored_by_disabling_demo_mode(): void
    {
        config(['training.demo_login' => false]);

        $response = $this->get(route('login'))->assertOk();
        $document = new \DOMDocument;
        $document->loadHTML($response->getContent(), LIBXML_NOERROR | LIBXML_NOWARNING);
        $xpath = new \DOMXPath($document);
        $forms = $xpath->query('//form[@action="'.route('login.store').'"]');
        $button = $xpath->query('//*[@data-test="login-button"]')->item(0);

        $this->assertSame(1, $forms->length);
        $this->assertSame('POST', $forms->item(0)->getAttribute('method'));
        $this->assertSame('button', $button->nodeName);
        $this->assertSame('submit', $button->getAttribute('type'));
        $this->assertSame(2, $xpath->query('.//input[@required]', $forms->item(0))->length);
    }
}
