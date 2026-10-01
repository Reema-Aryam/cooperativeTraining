<x-layouts::site-page :title="__('Personal profile')">
    <div class="mx-auto max-w-4xl px-4 py-10 sm:px-6 lg:px-8">
        <div class="mb-8"><p class="text-sm font-semibold text-[var(--brand-blue-600)]">{{ __('Account') }}</p><h1 class="mt-2 text-3xl font-bold text-[var(--brand-ink)]">{{ __('Personal profile') }}</h1><p class="mt-2 text-[var(--brand-muted)]">{{ __('View and update your account information and profile photo.') }}</p></div>
        @if(session('status'))<div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-900" role="status">{{ session('status') }}</div>@endif
        @if($errors->any())<div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-rose-900" role="alert">{{ __('Please review the highlighted fields.') }}<ul class="mt-2 list-inside list-disc">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        <form method="POST" action="{{ route('training.profile.update') }}" enctype="multipart/form-data" class="rounded-3xl border border-[var(--brand-line)] bg-white p-6 shadow-sm sm:p-8">
            @csrf @method('PUT')
            <div class="mb-8 flex flex-col items-center gap-4 border-b border-[var(--brand-line)] pb-8 sm:flex-row">
                @if($user->profile_photo_path)
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($user->profile_photo_path) }}" alt="{{ __('Profile photo') }}" class="size-24 rounded-full object-cover ring-4 ring-[var(--brand-blue-100)]">
                @else
                    <div class="flex size-24 items-center justify-center rounded-full bg-[var(--brand-blue-100)] text-2xl font-bold text-[var(--brand-blue-900)]">{{ $user->initials() }}</div>
                @endif
                <div class="w-full"><label for="profile_photo" class="mb-2 block text-sm font-semibold">{{ __('Profile photo') }}</label><input id="profile_photo" name="profile_photo" type="file" accept="image/*" class="block w-full text-sm text-zinc-600 file:me-4 file:rounded-lg file:border-0 file:bg-[var(--brand-blue-100)] file:px-4 file:py-2 file:font-semibold file:text-[var(--brand-blue-900)]"> <p class="mt-2 text-xs text-[var(--brand-muted)]">{{ __('JPG, PNG, or WebP. Maximum size: 2 MB.') }}</p></div>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div><label for="name" class="mb-2 block text-sm font-semibold">{{ __('User Name') }} *</label><input id="name" name="name" value="{{ old('name', $user->name) }}" required maxlength="255" class="w-full rounded-xl border border-[var(--brand-line)] px-4 py-3 focus:border-[var(--brand-blue-500)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-blue-100)]"></div>
                <div><label for="email" class="mb-2 block text-sm font-semibold">{{ __('Email address') }} *</label><input id="email" name="email" type="email" dir="ltr" value="{{ old('email', $user->email) }}" required maxlength="255" class="w-full rounded-xl border border-[var(--brand-line)] px-4 py-3 focus:border-[var(--brand-blue-500)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-blue-100)]"></div>
                <div><label for="arabic_name" class="mb-2 block text-sm font-semibold">{{ __('Arabic full name') }}</label><input id="arabic_name" name="arabic_name" value="{{ old('arabic_name', $user->arabic_name) }}" maxlength="255" class="w-full rounded-xl border border-[var(--brand-line)] px-4 py-3 focus:border-[var(--brand-blue-500)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-blue-100)]"></div>
                <div><label for="mobile" class="mb-2 block text-sm font-semibold">{{ __('Mobile number') }}</label><input id="mobile" name="mobile" type="tel" dir="ltr" value="{{ old('mobile', $user->mobile) }}" maxlength="30" class="w-full rounded-xl border border-[var(--brand-line)] px-4 py-3 focus:border-[var(--brand-blue-500)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-blue-100)]"></div>
            </div>
            <div class="mt-8 flex justify-end"><button class="min-h-12 rounded-xl bg-[var(--brand-blue-900)] px-7 font-semibold text-white hover:bg-[var(--brand-blue-950)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-sky-500)] focus:ring-offset-2">{{ __('Save changes') }}</button></div>
        </form>
    </div>
</x-layouts.site-page>
