<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEmailUpdateRequest;
use App\Http\Requests\UserNameUpdateRequest;
use App\Traits\SuccessMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    use SuccessMessage;
    public function index()
    {
        return view('frontend.pages.user-profile');
    }

    public function nameUpdate(UserNameUpdateRequest $request)
    {
        Auth::guard('web')
            ->user()
            ->where('id', $request->id)
            ->update(['name' => preg_replace('/[\s$@_*]+/', ' ',
                Str::title($request->name))]);
        $this->getUpdateSuccessMessage('Name');
        return redirect('/user-profile');
    }

    public function emailUpdate(UserEmailUpdateRequest $request)
    {
        $user = Auth::guard('web')->user();
        $user->clearPendingEmail();
        $user->newEmail($request->email);
        return redirect(route('verification.notice.new.email'));
    }
}
