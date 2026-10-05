<?php

use App\Http\Controllers\Admin\TrainingApplicationReviewController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\HealthCenterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('entry');
Route::view('/home', 'welcome')->name('home');

Route::post('language/{locale}', LanguageController::class)
    ->whereIn('locale', ['ar', 'en'])
    ->name('language.switch');

Route::post('chatbot/ask', ChatbotController::class)
    ->middleware('throttle:12,1')
    ->name('chatbot.ask');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('health-centers', HealthCenterController::class)->name('health-centers.index');
    Route::get('dashboard', function (Request $request) {
        return $request->user()->role === 'admin'
            ? redirect()->route('admin.training-applications.index')
            : redirect()->route('home');
    })->name('dashboard');
    Route::get('training/application', [TrainingApplicationController::class, 'index'])->name('training.application');
    Route::post('training/application', [TrainingApplicationController::class, 'store'])->name('training.application.store');
    Route::get('personal-profile', [ProfileController::class, 'edit'])->name('training.profile');
    Route::put('personal-profile', [ProfileController::class, 'update'])->name('training.profile.update');
    Route::get('admin/training-applications', [TrainingApplicationReviewController::class, 'index'])->name('admin.training-applications.index');
    Route::get('admin/training-applications/{trainingApplication}', [TrainingApplicationReviewController::class, 'show'])->name('admin.training-applications.show');
    Route::post('admin/training-applications/{trainingApplication}/decision', [TrainingApplicationReviewController::class, 'decide'])->name('admin.training-applications.decide');
});

require __DIR__.'/settings.php';
