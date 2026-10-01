<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainingApplicationController;
use App\Http\Controllers\Admin\TrainingApplicationReviewController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('entry');
Route::get('/home', function () {
    $namesByScope = [
        'الأول' => ['الغدير', 'النرجس', 'الربيع', 'الصحافة', 'الفلاح', 'الياسمين', 'الوادي', 'الازدهار'],
        'الثاني' => ['صلاح الدين', 'المصيف', 'المرسلات', 'حي الملك فهد', 'المروج', 'السليمانية', 'النزهة', 'الورود'],
        'الثالث' => ['اشبيليا', 'الخليج ٢', 'الحمراء', 'الخليج ١', 'قرطبة', 'اليرموك الغربية', 'حي الملك فيصل', 'المونسية', 'غرناطة'],
        'الرابع' => ['الروضة ١', 'الروضة ٢', 'النهضة الغربية', 'الجنادرية الغربية', 'الجنادرية الشرقية', 'التنظيم الشمالي', 'التنظيم الجنوبي', 'الندوة', 'هجرة سعد', 'مركز الرقابة الصحية بالمطار', 'عيادة المراسم الملكية', 'عيادة الديوان الملكي', 'عيادة صحة حياة مول'],
        'الخامس' => ['المنار', 'السلام', 'النسيم الأوسط', 'النسيم الجنوبي', 'النسيم الشرقي', 'النسيم الغربي', 'السعادة', 'الجزيرة'],
    ];

    $centers = collect($namesByScope)->flatMap(fn (array $names, string $scope) => collect($names)->map(fn (string $name) => [
        'assembly' => 'الرياض/التجمع الصحي الثاني',
        'governorate' => 'الرياض',
        'scope' => $scope,
        'name' => $name,
    ]))->values()->all();

    return view('welcome', compact('centers'));
})->name('home');

Route::post('language/{locale}', LanguageController::class)
    ->whereIn('locale', ['ar', 'en'])
    ->name('language.switch');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function (\Illuminate\Http\Request $request) {
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
