<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HealthCenterController extends Controller
{
    public function __invoke(Request $request): View
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'scope' => ['nullable', 'string', 'max:100'],
            'governorate' => ['nullable', 'string', 'max:100'],
        ]);
        $search = trim($filters['search'] ?? '');
        $scope = $filters['scope'] ?? '';
        $governorate = $filters['governorate'] ?? '';

        $catalog = collect(config('health-centers'))->flatMap(fn (array $names, string $scope) => collect($names)->map(fn (string $name) => [
            'assembly' => 'الرياض/التجمع الصحي الثاني',
            'governorate' => 'الرياض',
            'scope' => $scope,
            'name' => $name,
        ]))->values();

        $scopes = $catalog->pluck('scope')->unique()->values();
        $governorates = $catalog->pluck('governorate')->unique()->values();
        $total = $catalog->count();
        $centers = $catalog->filter(fn (array $center) => ($search === '' || mb_stripos($center['name'], $search) !== false)
            && ($scope === '' || $center['scope'] === $scope)
            && ($governorate === '' || $center['governorate'] === $governorate)
        )->values();

        return view('health-centers.index', compact('centers', 'scopes', 'governorates', 'total', 'search', 'scope', 'governorate'));
    }
}
