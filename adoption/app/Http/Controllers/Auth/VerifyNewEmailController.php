<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;
use ProtoneMedia\LaravelVerifyNewEmail\Http\InvalidVerificationLinkException;

class VerifyNewEmailController extends Controller
{
    use SuccessMessage;

    /**
     * Mark the user's new email address as verified.
     *
     * @param  string $token
     *
     * @throws InvalidVerificationLinkException
     */

    public function verify(string $token)
    {
        $user = app(config('verify-new-email.model'))->whereToken($token)->firstOr(['*'], function () {
            throw new InvalidVerificationLinkException(
                __('The verification link is not valid anymore.')
            );
        })->tap(function ($pendingUserEmail) {
            $pendingUserEmail->activate();
        })->user;

        if (config('verify-new-email.login_after_verification')) {
            Auth::guard()->login($user, config('verify-new-email.login_remember'));
        }

        return $this->authenticated();
    }

    protected function authenticated()
    {
        $this->getTaskSuccessMessage('New Email verified');
        return redirect(config('verify-new-email.redirect_to'));
    }
}
