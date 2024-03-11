<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\UserRegistrationMailJob;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewEmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request)
    {
        if (Auth::guard('web')->user()->getPendingEmail() == null) {
            return redirect('/user-profile');
        }

        Auth::guard('web')->user()->resendPendingEmailVerificationMail();
        return back()->with('status', 'new-email-verification-link-sent');
    }
}
