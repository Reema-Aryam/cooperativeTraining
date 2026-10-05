@props(['field', 'options'])
<div>
    <label for="{{ $field }}" class="mb-2 block text-sm font-semibold">{{ __('application_fields.'.$field) }} <span class="text-rose-600">*</span></label>
    <select id="{{ $field }}" name="{{ $field }}" required class="w-full rounded-xl border border-[var(--brand-line)] bg-white px-4 py-3 shadow-sm focus:border-[var(--brand-blue-500)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-blue-100)] @error($field) border-rose-500 @enderror">
        <option value="">{{ __('Select one') }}</option>
        @foreach($options as $value => $label)<option value="{{ $value }}" @selected(old($field) === $value)>{{ $label }}</option>@endforeach
    </select>
    @error($field)<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror
</div>
