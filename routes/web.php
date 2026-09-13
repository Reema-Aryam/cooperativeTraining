<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('entry');
Route::view('/home', 'welcome')->name('home');

Route::post('language/{locale}', LanguageController::class)
    ->whereIn('locale', ['ar', 'en'])
    ->name('language.switch');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
