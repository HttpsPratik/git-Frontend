<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=Users::all();
        return view('dashboard.pages.users',compact('users'));

    }


    public function store(Request $request)
    {
        $data=[
            'name'=>$request->input('name'),
          'email'=>$request->input('email'),
          'password'=>$request->input('password'),
          'contact_number'=>$request->input('contact_number'),
          'address'=>$request->input('address'),


        ];
        Users::create($data);
        return redirect()->back()->with('success', 'User created successfully');
    }


    public function update(Request $request, Users $users)
    {
        $data=[
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>$request->input('password'),
            'contact_number'=>$request->input('contact_number'),
            'address'=>$request->input('address'),


        ];
        Users::where('id',$request['id'])->update($data);
        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $users_id)
    {
        Users::where('id',$users_id)->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
