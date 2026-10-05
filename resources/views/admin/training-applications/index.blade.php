<x-layouts::site-page :title="__('Training applications')">
    @php
        $statusClasses = [
            'under_review' => 'is-under-review',
            'accepted' => 'is-accepted',
            'rejected' => 'is-rejected',
        ];
    @endphp

    <div class="admin-page page-shell">
        <div class="admin-overview-row">
            <div class="admin-total-card">
                <span>{{ __('Total applications') }}</span>
                <strong>{{ $applications->total() }}</strong>
            </div>
        </div>

        <section class="admin-table-card" aria-label="{{ __('Training applications') }}">
            <div class="admin-table-scroll">
                <table class="admin-table">
                    <thead>
                        <tr>
                            @foreach (['Reference number', 'Trainee', 'University', 'Training period', 'Application status', 'Submitted'] as $heading)
                                <th scope="col">{{ __($heading) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                            <tr>
                                <td data-label="{{ __('Reference number') }}">
                                    <a class="admin-reference-link" href="{{ route('admin.training-applications.show', $application) }}" dir="ltr">{{ $application->reference_number }}</a>
                                </td>
                                <td data-label="{{ __('Trainee') }}">
                                    <div class="admin-trainee-name">{{ $application->arabic_name }}</div>
                                    <div class="admin-secondary-text" dir="ltr">{{ $application->email }}</div>
                                </td>
                                <td data-label="{{ __('University') }}">{{ config('training.universities.'.$application->university.'.'.app()->getLocale()) }}</td>
                                <td data-label="{{ __('Training period') }}" dir="ltr" class="admin-nowrap">{{ $application->training_start_date->format('Y-m-d') }} — {{ $application->training_end_date->format('Y-m-d') }}</td>
                                <td data-label="{{ __('Application status') }}"><span class="admin-status-pill {{ $statusClasses[$application->status] ?? '' }}">{{ __('application_status.'.$application->status) }}</span></td>
                                <td data-label="{{ __('Submitted') }}" class="admin-nowrap">{{ $application->created_at->format('Y-m-d') }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="admin-empty-cell"><span class="admin-empty-icon"><flux:icon name="inbox" /></span><strong>{{ __('No training applications yet.') }}</strong></td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($applications->hasPages())
                <div class="admin-pagination">{{ $applications->links() }}</div>
            @endif
        </section>
    </div>
</x-layouts::site-page>
