<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        /** @var Request $request */
        Auth::guard(config('fortify.guard'))->logout();

        return redirect()->route('login')->with('status', __('Registration successful. You can now log in.'));
    }
}
