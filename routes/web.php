<?php

use App\Http\Controllers\LanguageController;
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
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
