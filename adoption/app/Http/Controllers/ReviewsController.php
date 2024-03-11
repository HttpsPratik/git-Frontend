<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews=Reviews::all();
        return view('dashboard.pages.reviews',compact('reviews'));
    }

    public function store(Request $request)
    {
        $data=[
            'user_id'=>$request->input('user_id'),
            'listing_id'=>$request->input('listing_id'),
            'rating'=>$request->input('numeric|between:1,5'),
            'review_content'=>$request->input('review_content'),

        ];
        Reviews::create($data);
        return redirect()->back()->with('success', 'User created successfully');
    }


    public function update(Request $request)
    {
        $data=[
            'user_id'=>$request->input('user_id'),
            'listing_id'=>$request->input('listing_id'),
            'rating'=>$request->input('numeric|between:1,5'),
            'review_content'=>$request->input('review_content'),

        ];
        Reviews::where('id', $request['id'])->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($reviews_id)
    {
        Reviews::where('id',$reviews_id)->delete();
        return redirect()->back();
    }
}
