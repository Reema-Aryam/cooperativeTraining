<x-layouts::site-page :title="__('Training application')">
    <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
        @if ($application)
            @php($statusColor = ['under_review' => 'bg-amber-100 text-amber-800', 'accepted' => 'bg-emerald-100 text-emerald-800', 'rejected' => 'bg-rose-100 text-rose-800'][$application->status] ?? 'bg-zinc-100 text-zinc-700')
            <div class="mb-6 flex flex-wrap items-center justify-between gap-3 rounded-2xl border border-[var(--brand-line)] bg-white px-5 py-3 shadow-sm">
                <div class="text-sm font-medium text-[var(--brand-muted)]">{{ __('Application status') }} <span dir="ltr">· {{ $application->reference_number }}</span></div>
                <span class="inline-flex rounded-full px-3 py-1 text-sm font-semibold {{ $statusColor }}">{{ __('application_status.'.$application->status) }}</span>
            </div>
        @endif

        @if (session('status'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 p-4 text-emerald-900" role="status">{{ session('status') }}</div>
        @endif

        @if ($application)
            <section class="rounded-3xl border border-[var(--brand-line)] bg-white p-6 shadow-sm sm:p-8">
                <div class="mb-6 flex items-start gap-4">
                    <div class="flex size-12 shrink-0 items-center justify-center rounded-2xl bg-[var(--brand-blue-100)] text-[var(--brand-blue-900)]"><flux:icon name="clipboard-document-check" /></div>
                    <div><h2 class="text-xl font-bold text-[var(--brand-ink)]">{{ __('Your application has been received') }}</h2><p class="mt-1 text-[var(--brand-muted)]">{{ __('We will email you when a decision is made.') }}</p></div>
                </div>
                <dl class="grid gap-4 rounded-2xl bg-[var(--brand-paper)] p-5 sm:grid-cols-3">
                    <div><dt class="text-sm text-[var(--brand-muted)]">{{ __('Reference number') }}</dt><dd class="mt-1 font-semibold" dir="ltr">{{ $application->reference_number }}</dd></div>
                    <div><dt class="text-sm text-[var(--brand-muted)]">{{ __('University') }}</dt><dd class="mt-1 font-semibold">{{ config('training.universities.'.$application->university.'.'.app()->getLocale()) }}</dd></div>
                    <div><dt class="text-sm text-[var(--brand-muted)]">{{ __('Training period') }}</dt><dd class="mt-1 font-semibold" dir="ltr">{{ $application->training_start_date->format('Y-m-d') }} — {{ $application->training_end_date->format('Y-m-d') }}</dd></div>
                </dl>
                @if ($application->decision_note)<p class="mt-5 rounded-xl bg-zinc-50 p-4 text-sm">{{ $application->decision_note }}</p>@endif
            </section>
        @else
            @if ($errors->any())
                <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-rose-900" role="alert"><p class="font-semibold">{{ __('Please review the highlighted fields.') }}</p><ul class="mt-2 list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
            @endif
            <form method="POST" action="{{ route('training.application.store') }}">
                @csrf
                <section class="rounded-3xl border border-[var(--brand-line)] bg-white p-6 shadow-sm sm:p-8">
                    <h2 class="mb-5 text-base font-bold text-[var(--brand-blue-900)]">{{ __('Personal and university information') }}</h2>
                    <div class="grid gap-x-6 gap-y-5 md:grid-cols-2 lg:grid-cols-3">
                        <div><label for="reference_number" class="mb-2 block text-sm font-semibold">{{ __('Reference number') }}</label><input id="reference_number" value="{{ __('Assigned after submission') }}" disabled class="w-full cursor-not-allowed rounded-xl border border-[var(--brand-line)] bg-zinc-50 px-4 py-3 text-zinc-500" aria-describedby="reference-help"><p id="reference-help" class="mt-1 text-xs text-[var(--brand-muted)]">{{ __('Your reference number will be created automatically.') }}</p></div>
                        @foreach (['national_id', 'student_id', 'arabic_name', 'first_name', 'middle_name', 'grandfather_name', 'last_name'] as $field)
                            <x-training.field :field="$field" />
                        @endforeach
                        <x-training.select field="gender" :options="['male' => __('Male'), 'female' => __('Female')]" />
                        @foreach (['mobile', 'email', 'supervisor_name', 'supervisor_email'] as $field)
                            <x-training.field :field="$field" :type="str_contains($field, 'email') ? 'email' : 'text'" />
                        @endforeach
                        <x-training.select field="university" :options="collect(config('training.universities'))->mapWithKeys(fn ($names, $key) => [$key => $names[app()->getLocale()]])->all()" />
                        <x-training.select field="degree" :options="collect(config('training.degrees'))->mapWithKeys(fn ($names, $key) => [$key => $names[app()->getLocale()]])->all()" />
                        <x-training.select field="degree_major" :options="collect(config('training.majors'))->mapWithKeys(fn ($names, $key) => [$key => $names[app()->getLocale()]])->all()" />
                        <h2 class="mt-3 border-t border-[var(--brand-line)] pt-5 text-base font-bold text-[var(--brand-blue-900)] md:col-span-2 lg:col-span-3">{{ __('Training preferences') }}</h2>
                        <x-training.select field="training_preference" :options="['onsite' => __('Onsite training'), 'remote' => __('Remote training')]" />
                        <x-training.select field="training_type" :options="['business_administration' => __('Business Administration'), 'it' => __('Information Technology')]" />
                        <x-training.select field="country" :options="['saudi_arabia' => __('Saudi Arabia')]" />
                        <x-training.field field="training_start_date" type="date" />
                        <x-training.field field="training_end_date" type="date" />
                        <div class="md:col-span-2 lg:col-span-3"><label for="note" class="mb-2 block text-sm font-semibold">{{ __('Note') }} <span class="font-normal text-zinc-500">({{ __('Optional') }})</span></label><textarea id="note" name="note" rows="4" maxlength="3000" class="w-full rounded-xl border border-[var(--brand-line)] bg-white px-4 py-3 shadow-sm focus:border-[var(--brand-blue-500)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-blue-100)]">{{ old('note') }}</textarea>@error('note')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                        <div class="mt-3 flex flex-col-reverse items-start justify-between gap-4 border-t border-[var(--brand-line)] pt-5 sm:flex-row sm:items-center md:col-span-2 lg:col-span-3">
                            <p class="text-sm text-[var(--brand-muted)]">{{ __('Your application will be saved as under review.') }}</p>
                            <button type="submit" class="inline-flex min-h-12 w-full items-center justify-center gap-2 rounded-xl bg-[var(--brand-blue-900)] px-7 font-semibold text-white shadow-sm transition hover:bg-[var(--brand-blue-950)] focus:outline-none focus:ring-2 focus:ring-[var(--brand-sky-500)] focus:ring-offset-2 sm:w-auto">{{ __('Submit application') }} <flux:icon name="arrow-left" class="size-4 rtl:rotate-0 ltr:rotate-180" /></button>
                        </div>
                    </div>
                </section>
            </form>
        @endif
    </div>
</x-layouts.site-page>
