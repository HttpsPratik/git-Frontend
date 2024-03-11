<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserSearchRequest;
use App\Service\UserService;

class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    public function index()
    {

    }

    public function allUser(UserSearchRequest $request)
    {
        $users = $this->userService->getAllUser($request->validated())->withQueryString();
        return view('dashboard.pages.users', compact('users'));
    }

    public function reloadCaptchaUser()
    {
        return response()->json(['captcha'=> captcha_img('flat')]);
    }
}
