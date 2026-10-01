<?php

namespace App\Http\Controllers;

use App\Models\TrainingApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class TrainingApplicationController extends Controller
{
    public function index(Request $request): View
    {
        abort_unless($request->user()->role === 'trainee', 403);
        $application = $request->user()->trainingApplications()->latest()->first();

        return view('training.apply', ['application' => $application]);
    }

    public function store(Request $request): RedirectResponse
    {
        abort_unless($request->user()->role === 'trainee', 403);
        if ($request->user()->trainingApplications()->exists()) {
            return redirect()->route('training.application');
        }

        $universities = array_keys(config('training.universities'));
        $degrees = array_keys(config('training.degrees'));
        $majors = array_keys(config('training.majors'));
        $data = $request->validate([
            'national_id' => ['required', 'string', 'max:30'],
            'student_id' => ['required', 'string', 'max:50'],
            'arabic_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:100'],
            'middle_name' => ['required', 'string', 'max:100'],
            'grandfather_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'gender' => ['required', Rule::in(['male', 'female'])],
            'mobile' => ['required', 'string', 'max:30'],
            'email' => ['required', 'email', 'max:255'],
            'supervisor_name' => ['required', 'string', 'max:255'],
            'supervisor_email' => ['required', 'email', 'max:255'],
            'training_preference' => ['required', Rule::in(['onsite', 'remote'])],
            'training_type' => ['required', Rule::in(['business_administration', 'it'])],
            'country' => ['required', Rule::in(['saudi_arabia'])],
            'university' => ['required', Rule::in($universities)],
            'degree' => ['required', Rule::in($degrees)],
            'degree_major' => ['required', Rule::in($majors)],
            'training_start_date' => ['required', 'date', 'after_or_equal:today'],
            'training_end_date' => ['required', 'date', 'after:training_start_date'],
            'note' => ['nullable', 'string', 'max:3000'],
        ]);

        $data['user_id'] = $request->user()->id;
        $data['reference_number'] = 'CT-'.now()->format('Y').'-'.Str::upper(Str::random(8));
        $data['status'] = 'under_review';
        $request->user()->trainingApplications()->create($data);

        return redirect()->route('training.application')->with('status', __('Application submitted for review.'));
    }
}
