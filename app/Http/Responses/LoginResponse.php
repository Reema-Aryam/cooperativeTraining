<?php

namespace App\Http\Responses;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request): RedirectResponse
    {
        /** @var Request $request */
        $destination = $request->user()?->role === 'admin'
            ? route('admin.training-applications.index')
            : route('home');

        return redirect()->to($destination);
    }
}
