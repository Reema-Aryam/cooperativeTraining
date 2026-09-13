@props([
    'sidebar' => false,
])

<a {{ $attributes->class(['flex items-center', 'px-2' => $sidebar]) }} @if($sidebar) data-flux-sidebar-brand @else data-flux-brand @endif>
    <x-app-logo-icon class="h-auto w-44 max-w-full" />
    <span class="sr-only">{{ __('site.name') }}</span>
</a>
