<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function __invoke(Request $request, string $locale): RedirectResponse
    {
        abort_unless(in_array($locale, ['ar', 'en'], true), 404);

        $request->session()->put('locale', $locale);

        $destination = $request->input('return_to', '/');
        $decoded = is_string($destination) ? rawurldecode($destination) : '';

        // Only return to a local path, including its query string.
        if (! str_starts_with($decoded, '/')
            || str_starts_with($decoded, '//')
            || str_contains($decoded, '\\')
            || preg_match('/[\x00-\x1f\x7f]/', $decoded)) {
            $destination = '/';
        }

        // A stale section anchor must not scroll the translated page to that section.
        $destination = explode('#', $destination, 2)[0];

        return redirect()->to($destination, 303);
    }
}
