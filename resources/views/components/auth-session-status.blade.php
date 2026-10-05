@props([
    'status',
])

@if ($status)
    <div {{ $attributes->merge(['class' => 'flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium leading-6 text-emerald-900 shadow-sm']) }} role="status" aria-live="polite">
        <flux:icon.check-circle class="mt-0.5 size-5 shrink-0 text-emerald-700" />
        <span>{{ $status }}</span>
    </div>
@endif
