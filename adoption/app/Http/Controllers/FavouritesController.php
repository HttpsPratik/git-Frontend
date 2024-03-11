<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $favourites=Favourites::all();
        return view('dashboard.pages.favourites',compact('favourites'));
    }

    public function store(Request $request)
    {
        $data = [
            'user_id'=>$request->input('user_id'),
            'listing_id'=>$request->input('listing_id'),
        ];
        Favourites::create($data);
        return redirect()->back()->with('success', 'User created successfully');
    }


    public function update(Request $request)
    {

        $data = [
            'user_id'=>$request->input('user_id'),
            'listing_id'=>$request->input('listing_id'),
        ];
        Favourites::where('id', $request['id'])->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($favourites_id)
    {
Favourites::where('id',$favourites_id)->delete();
return redirect()->back();
    }
}
