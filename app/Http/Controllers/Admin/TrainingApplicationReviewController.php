<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TrainingApplicationDecision;
use App\Models\TrainingApplication;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class TrainingApplicationReviewController extends Controller
{
    private function ensureAdmin(Request $request): void
    {
        abort_unless($request->user()->role === 'admin', 403);
    }

    public function index(Request $request): View
    {
        $this->ensureAdmin($request);
        $applications = TrainingApplication::with('user')->latest()->paginate(20);

        return view('admin.training-applications.index', compact('applications'));
    }

    public function show(Request $request, TrainingApplication $trainingApplication): View
    {
        $this->ensureAdmin($request);

        return view('admin.training-applications.show', ['application' => $trainingApplication->load('user')]);
    }

    public function decide(Request $request, TrainingApplication $trainingApplication): RedirectResponse
    {
        $this->ensureAdmin($request);
        abort_unless($trainingApplication->status === 'under_review', 409);
        $data = $request->validate([
            'decision' => ['required', 'in:accepted,rejected'],
            'decision_note' => ['nullable', 'string', 'max:2000'],
        ]);

        $trainingApplication->update([
            'status' => $data['decision'],
            'decision_note' => $data['decision_note'] ?? null,
            'reviewed_by' => $request->user()->id,
            'reviewed_at' => now(),
        ]);

        Mail::to($trainingApplication->email)->send(new TrainingApplicationDecision($trainingApplication));

        return redirect()->route('admin.training-applications.show', $trainingApplication)
            ->with('status', __('Decision saved and email sent.'));
    }
}
