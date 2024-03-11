<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\PasswordUpdateRequest;
use App\Traits\SuccessMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    use SuccessMessage;
    /**
     * Update the user's password.
     */
    public function update(PasswordUpdateRequest $request): RedirectResponse
    {
        Auth::guard('web')->user()->update([
            'password' => Hash::make($request->password),
        ]);

        $this->getUpdateSuccessMessage('Password');
        return back();
    }
}
