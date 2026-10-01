<div style="font-family:Arial,sans-serif;line-height:1.7;max-width:640px;margin:auto;color:#173245">
    <h1>{{ __('Training application decision') }}</h1>
    <p>{{ __('Hello') }} {{ $application->arabic_name }},</p>
    <p>{{ __('The status of your cooperative training application :reference is now: :status', ['reference' => $application->reference_number, 'status' => __('application_status.'.$application->status)]) }}</p>
    @if($application->decision_note)<p><strong>{{ __('Decision note') }}:</strong> {{ $application->decision_note }}</p>@endif
    <p>{{ __('You can sign in to the training portal to view your application.') }}</p>
    <p>{{ __('site.organization') }}</p>
</div>
