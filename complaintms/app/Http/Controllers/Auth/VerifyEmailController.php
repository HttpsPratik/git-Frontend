<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Traits\SuccessMessage;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VerifyEmailController extends Controller
{
    use SuccessMessage;
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if (Auth::guard('web')->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        if (Auth::guard('web')->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        $this->getTaskSuccessMessage("Email Verification Complete");
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
