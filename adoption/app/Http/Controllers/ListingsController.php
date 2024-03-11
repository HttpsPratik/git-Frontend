<?php

namespace App\Http\Controllers;

use App\Models\Listings;
use Illuminate\Http\Request;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listings = Listings::all();
        return view('dashboard.pages.listings', compact('listings'));
    }

    public function store(Request $request)
    {

        $data=[

            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
        ];

        // Upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['images'] = $imageName;
        }

        Listings::create($data);
        return redirect()->back()->with('success', 'Listing created successfully');
    }

    public function update(Request $request, Listings $listings)
    {

        $data = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'category' => $request->input('category'),
            'gender' => $request->input('gender'),
            'status' => $request->input('status'),
        ];
        // Update image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $data['images'] = $imageName;
        }

        Listings::where('id', $request['id'])->update($data);
        return redirect()->back()->with('success', 'Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($listings_id)
    {
        Listings::where('id', $listings_id)->delete();

        return redirect()->back()->with('success', 'Listing deleted successfully');
    }
}
