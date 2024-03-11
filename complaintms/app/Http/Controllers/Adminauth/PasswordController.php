<?php

namespace App\Http\Controllers\Adminauth;

use App\Facade\LogActivity;
use App\Http\Controllers\Controller;
use App\Traits\SuccessMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    use SuccessMessage;
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->getTaskSuccessMessage('Password Updated');
        LogActivity::addToLog('Updated Password');
        return redirect()->back();
    }
}
