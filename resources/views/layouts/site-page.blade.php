<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        @include('partials.head', ['title' => $title ?? __('site.name')])
        <meta name="description" content="{{ __('site.meta_description') }}">
    </head>
    <body class="prototype-home">
        <a class="skip-link" href="#main-content">{{ __('site.skip_content') }}</a>
        @include('partials.site-header')
        <main id="main-content">{{ $slot }}</main>
        <footer class="site-footer">
            <div class="page-shell footer-main">
                <a href="{{ route('home') }}" class="brand footer-brand"><img class="brand-logo" src="{{ asset('images/rshc-logo.png') }}" alt="{{ __('site.organization') }}" width="1658" height="470"><span class="brand-divider" aria-hidden="true"></span><span class="brand-copy"><strong>{{ __('site.name') }}</strong><small>{{ __('site.tagline') }}</small></span></a>
                <p>{{ __('site.hero_description') }}</p>
                <nav aria-label="{{ __('site.main_navigation') }}"><a href="{{ route('home') }}">{{ __('site.home') }}</a>@auth @if(auth()->user()->role !== 'admin')<a href="{{ route('training.application') }}">{{ __('Training application') }}</a>@endif @endauth</nav>
            </div>
            <div class="page-shell footer-bottom"><span>© {{ date('Y') }} {{ __('site.institution') }}</span><span>{{ __('site.name') }}</span></div>
        </footer>
        @include('partials.chatbot')
        @fluxScripts
    </body>
</html>
