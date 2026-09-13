@php
    $opportunities = __('site.opportunities');
    $steps = __('site.steps');
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        @include('partials.head', ['title' => __('site.page_title')])
        <meta name="description" content="{{ __('site.meta_description') }}">
    </head>
    <body class="prototype-home">
        <a class="skip-link" href="#main-content">{{ __('site.skip_content') }}</a>

        <header class="site-header">
            <div class="page-shell header-inner">
                <a href="{{ route('home') }}" class="brand" aria-label="{{ __('site.home_label') }}">
                    <img class="brand-logo" src="{{ asset('images/rshc-logo.png') }}" alt="{{ __('site.organization') }}" width="1658" height="470">
                    <span class="brand-divider" aria-hidden="true"></span>
                    <span class="brand-copy"><strong>{{ __('site.name') }}</strong><small>{{ __('site.tagline') }}</small></span>
                </a>
                <nav class="desktop-nav" aria-label="{{ __('site.main_navigation') }}">
                    <a class="is-active" href="#home">{{ __('site.home') }}</a>
                    <a href="#about">{{ __('site.about_training') }}</a>
                    <a href="#opportunities">{{ __('site.training_opportunities') }}</a>
                    <a href="#journey">{{ __('site.trainee_journey') }}</a>
                    <a href="#faq">{{ __('site.faq') }}</a>
                </nav>
                @if (Route::has('login'))
                    <a class="button button-outline header-login" href="{{ route('login') }}">{{ __('site.login') }} <flux:icon.user-circle class="size-5 shrink-0" /></a>
                @endif
                <x-language-switcher />
                <details class="mobile-menu">
                    <summary aria-label="{{ __('site.open_navigation') }}"><span></span><span></span><span></span></summary>
                    <nav aria-label="{{ __('site.mobile_navigation') }}">
                        <a href="#home">{{ __('site.home') }}</a><a href="#about">{{ __('site.about_training') }}</a><a href="#opportunities">{{ __('site.training_opportunities') }}</a><a href="#journey">{{ __('site.trainee_journey') }}</a>
                        @if (Route::has('login'))<a href="{{ route('login') }}">{{ __('site.login') }}</a>@endif
                    </nav>
                </details>
            </div>
        </header>

        <main id="main-content">
            <section class="home-intro" id="home" aria-label="{{ __('site.home') }}">
            <section class="hero" aria-labelledby="hero-title">
                <div class="hero-accent hero-accent-one" aria-hidden="true"></div><div class="hero-accent hero-accent-two" aria-hidden="true"></div>
                <div class="page-shell hero-grid">
                    <div class="hero-copy">
                        <span class="eyebrow"><i></i> {{ __('site.name') }}</span>
                        <h1 id="hero-title">{{ __('site.hero_heading') }}<br><em>{{ __('site.hero_highlight') }}</em></h1>
                        <p>{{ __('site.hero_description') }}</p>
                        <div class="hero-actions">
                            <a class="button button-primary" href="#opportunities">{{ __('site.browse_opportunities') }} <span class="direction-arrow" aria-hidden="true">←</span></a>
                            <a class="text-link" href="#about">{{ __('site.learn_program') }} <span aria-hidden="true">↓</span></a>
                        </div>
                        <div class="hero-note"><span class="note-icon" aria-hidden="true">✓</span><p><strong>{{ __('site.unified_journey') }}</strong><small>{{ __('site.journey_scope') }}</small></p></div>
                    </div>

                    <div class="hero-visual" aria-label="{{ __('site.application_preview') }}">
                        <div class="visual-kicker">{{ __('site.journey_one_place') }}</div>
                        <div class="journey-card">
                            <div class="journey-card-head">
                                <div><small>{{ __('site.application_status') }}</small><strong>{{ __('site.training_application') }}</strong></div>
                                <span class="status-pill">{{ __('site.under_review') }}</span>
                            </div>
                            <div class="progress-track" aria-label="{{ __('site.application_progress') }}"><span></span></div>
                            <ol class="mini-timeline">
                                <li class="is-done"><i>✓</i><span><strong>{{ __('site.profile_complete') }}</strong><small>{{ __('site.data_verified') }}</small></span></li>
                                <li class="is-done"><i>✓</i><span><strong>{{ __('site.opportunity_selected') }}</strong><small>{{ __('site.health_informatics') }}</small></span></li>
                                <li class="is-current"><i>3</i><span><strong>{{ __('site.application_review') }}</strong><small>{{ __('site.team_review') }}</small></span></li>
                                <li><i>4</i><span><strong>{{ __('site.final_decision') }}</strong><small>{{ __('site.update_notification') }}</small></span></li>
                            </ol>
                        </div>
                        <div class="floating-card floating-card-top"><span aria-hidden="true">✦</span><p><strong>{{ __('site.quality_opportunities') }}</strong><small>{{ __('site.multiple_specialties') }}</small></p></div>
                        <div class="floating-card floating-card-bottom"><strong>{{ __('site.one_profile') }}</strong><small>{{ __('site.full_journey') }}</small></div>
                    </div>
                </div>
            </section>

            <section class="trust-strip" aria-label="{{ __('site.platform_benefits') }}">
                <div class="page-shell trust-grid">
                    <div><b>01</b><span><strong>{{ __('site.online_application') }}</strong><small>{{ __('site.simple_steps') }}</small></span></div>
                    <div><b>02</b><span><strong>{{ __('site.live_tracking') }}</strong><small>{{ __('site.status_updates') }}</small></span></div>
                    <div><b>03</b><span><strong>{{ __('site.specialized_opportunities') }}</strong><small>{{ __('site.healthcare_experience') }}</small></span></div>
                    <div><b>04</b><span><strong>{{ __('site.complete_experience') }}</strong><small>{{ __('site.application_to_assessment') }}</small></span></div>
                </div>
            </section>

            </section>

            <section class="section about-section" id="about">
                <div class="page-shell about-grid">
                    <div><span class="section-label">{{ __('site.about_program') }}</span><h2>{{ __('site.about_heading') }}</h2></div>
                    <div class="about-copy"><p>{{ __('site.about_description') }}</p><a class="text-link dark" href="#journey">{{ __('site.discover_journey') }} <span class="direction-arrow" aria-hidden="true">←</span></a></div>
                </div>
            </section>

            <section class="section journey-section" id="journey">
                <div class="page-shell">
                    <div class="section-heading centered"><span class="section-label">{{ __('site.clear_journey') }}</span><h2>{{ __('site.journey_heading') }}</h2><p>{{ __('site.journey_description') }}</p></div>
                    <div class="steps-grid">
                        @foreach ($steps as $step)
                            <article class="step-card"><span class="step-number">{{ $step['number'] }}</span><h3>{{ $step['title'] }}</h3><p>{{ $step['text'] }}</p></article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section opportunities-section" id="opportunities">
                <div class="page-shell">
                    <div class="section-heading opportunities-heading">
                        <div><span class="section-label">{{ __('site.selected_opportunities') }}</span><h2>{{ __('site.opportunities_heading') }}</h2></div>
                        <a class="button button-outline" href="#">{{ __('site.all_opportunities') }} <span class="direction-arrow" aria-hidden="true">←</span></a>
                    </div>
                    <div class="opportunity-grid">
                        @foreach ($opportunities as $opportunity)
                            <article class="opportunity-card">
                                <div class="opportunity-meta"><span class="status-dot"><i></i>{{ __('site.accepting_applications') }}</span><span>{{ $opportunity['department'] }}</span></div>
                                <h3>{{ $opportunity['title'] }}</h3><p>{{ $opportunity['description'] }}</p>
                                <dl><div><dt>{{ __('site.duration') }}</dt><dd>{{ $opportunity['duration'] }}</dd></div><div><dt>{{ __('site.location') }}</dt><dd>{{ $opportunity['location'] }}</dd></div></dl>
                                <a href="#" aria-label="{{ __('site.view_opportunity', ['title' => $opportunity['title']]) }}">{{ __('site.opportunity_details') }} <span class="direction-arrow" aria-hidden="true">←</span></a>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>

            <section class="section cta-section" id="faq">
                <div class="page-shell"><div class="cta-panel"><span class="cta-number" aria-hidden="true">01</span><div><span class="section-label light">{{ __('site.ready') }}</span><h2>{{ __('site.cta_heading') }}</h2><p>{{ __('site.cta_description') }}</p></div>@if (Route::has('register'))<a class="button button-sky" href="{{ route('register') }}">{{ __('site.create_account') }} <span class="direction-arrow" aria-hidden="true">←</span></a>@endif</div></div>
            </section>
        </main>

        <footer class="site-footer">
            <div class="page-shell footer-main">
                <div class="brand footer-brand"><img class="brand-logo" src="{{ asset('images/rshc-logo.png') }}" alt="{{ __('site.organization') }}" width="1658" height="470"><span class="brand-divider" aria-hidden="true"></span><span class="brand-copy"><strong>{{ __('site.name') }}</strong><small>{{ __('site.tagline') }}</small></span></div>
                <p>{{ __('site.footer_description') }}</p>
                <nav aria-label="{{ __('site.footer_links') }}"><a href="#about">{{ __('site.about_training') }}</a><a href="#opportunities">{{ __('site.training_opportunities') }}</a><a href="#faq">{{ __('site.support') }}</a></nav>
            </div>
            <div class="page-shell footer-bottom"><span>© {{ date('Y') }} {{ __('site.institution') }}</span><span>{{ __('site.prototype') }}</span></div>
        </footer>
        @fluxScripts
    </body>
</html>
