<?php

namespace App\Http\Middleware;

use App\Traits\SuccessMessage;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class Role
{
    use SuccessMessage;

    public function handle(Request $request, Closure $next, $role)
    {
        /*if (Auth::guard('admin')->check()) {
            if (Auth::user()->checkRank($rank))
            {
                return $next($request);
            } else {
                if($request->wantsJson()){
                    $this->getErrorMessage('Access Restricted');
                    return response()->json(['redirect' => $request->windowUrl]);
                } else {
                    return redirect()->back()->withErrors(['msg' => 'Access Restricted']);
                }
            }
        } else {
            return redirect()->back();
        }*/

        if (Auth::guard('admin')->check()) {
            if(Gate::allows('authorized', $role))
            {
                return $next($request);
            } else {
                if($request->wantsJson()){
                    $this->getErrorMessage('Access Restricted');
                    return response()->json(['redirect' => $request->windowUrl]);
                } else {
                    return redirect()->back()->withErrors(['msg' => 'Access Restricted']);
                }
            }
        } else {
            return redirect()->back();
        }
    }
}
