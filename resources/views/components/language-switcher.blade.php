@php
    $targetLocale = app()->getLocale() === 'ar' ? 'en' : 'ar';
@endphp

<form method="POST" action="{{ route('language.switch', $targetLocale) }}"
      {{ $attributes->class(['language-switcher']) }}
      x-data x-on:submit="$refs.returnTo.value = window.location.pathname + window.location.search">
    @csrf
    <input type="hidden" name="return_to" value="{{ request()->getRequestUri() }}" x-ref="returnTo">
    <button type="submit" class="language-switcher-button" lang="{{ $targetLocale }}"
            aria-label="{{ __('site.switch_language') }}" data-test="language-switcher">
        {{ $targetLocale === 'ar' ? 'العربية' : 'English' }}
    </button>
</form>
