<x-layouts::site-page :title="__('Application details')">
    @php($decisionClasses = ['under_review' => 'is-under-review', 'accepted' => 'is-accepted', 'rejected' => 'is-rejected'])
    <div class="admin-page page-shell admin-detail-page">
        <a href="{{ route('admin.training-applications.index') }}" class="admin-back-link"><flux:icon name="arrow-right" class="size-4" />{{ __('Training applications') }}</a>

        <header class="admin-page-heading admin-detail-heading">
            <div>
                <p class="admin-eyebrow" dir="ltr">{{ $application->reference_number }}</p>
                <h1>{{ __('Application details') }}</h1>
            </div>
            <span class="admin-status-pill {{ $decisionClasses[$application->status] ?? '' }}">{{ __('application_status.'.$application->status) }}</span>
        </header>

        @if (session('status'))
            <div class="admin-success-message" role="status"><flux:icon name="check-circle" class="size-5" />{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="admin-error-message" role="alert">{{ __('Please review the highlighted fields.') }} @foreach ($errors->all() as $error)<span>{{ $error }}</span>@endforeach</div>
        @endif

        <section class="admin-card">
            <h2>{{ __('Personal and university information') }}</h2>
            <dl class="admin-data-grid">
                @foreach (['national_id', 'student_id', 'arabic_name', 'first_name', 'middle_name', 'grandfather_name', 'last_name', 'gender', 'mobile', 'email', 'supervisor_name', 'supervisor_email', 'training_preference', 'training_type', 'country', 'university', 'degree', 'degree_major', 'training_start_date', 'training_end_date', 'note'] as $field)
                    <div class="admin-data-item">
                        <dt>{{ __('application_fields.'.$field) }}</dt>
                        <dd @if (in_array($field, ['national_id', 'student_id', 'mobile', 'email', 'supervisor_email', 'training_start_date', 'training_end_date'], true)) dir="ltr" @endif>
                            @if ($field === 'university'){{ config('training.universities.'.$application->$field.'.'.app()->getLocale()) }}
                            @elseif ($field === 'degree'){{ config('training.degrees.'.$application->$field.'.'.app()->getLocale()) }}
                            @elseif ($field === 'degree_major'){{ config('training.majors.'.$application->$field.'.'.app()->getLocale()) }}
                            @elseif ($field === 'country'){{ __('Saudi Arabia') }}
                            @elseif ($field === 'gender'){{ __($application->$field === 'male' ? 'Male' : 'Female') }}
                            @elseif ($field === 'training_preference'){{ __($application->$field === 'onsite' ? 'Onsite training' : 'Remote training') }}
                            @elseif ($field === 'training_type'){{ __($application->$field === 'it' ? 'Information Technology' : 'Business Administration') }}
                            @elseif (str_ends_with($field, '_date')){{ $application->$field->format('Y-m-d') }}
                            @else{{ $application->$field ?: '—' }}@endif
                        </dd>
                    </div>
                @endforeach
            </dl>
        </section>

        @if ($application->status === 'under_review')
            <form method="POST" action="{{ route('admin.training-applications.decide', $application) }}" class="admin-card admin-decision-card">
                @csrf
                <h2>{{ __('Record a decision') }}</h2>
                <label for="decision_note">{{ __('Decision note') }} <span>({{ __('Optional') }})</span></label>
                <textarea id="decision_note" name="decision_note" rows="4" maxlength="2000">{{ old('decision_note') }}</textarea>
                <div class="admin-decision-actions">
                    <button name="decision" value="rejected" class="admin-button admin-button-reject"><flux:icon name="x-mark" class="size-4" />{{ __('Reject application') }}</button>
                    <button name="decision" value="accepted" class="admin-button admin-button-accept"><flux:icon name="check" class="size-4" />{{ __('Accept application') }}</button>
                </div>
            </form>
        @endif
    </div>
</x-layouts::site-page>
