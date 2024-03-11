<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions=transactions::all();
        return view('dashboard.pages.transactions',compact('transactions'));
    }

    public function store(Request $request)
    {

        $data = [

            'buyer_id'=>$request->input('buyer_id'),
            'seller_id'=>$request->input('seller_id'),
            'listing_id'=>$request->input('listing_id'),
            'transaction_date'=>$request->input('required|date'),
            'amount'=>$request->input('required|numeric'),
        ];
        Transactions::create($data);
        return redirect()->back()->with('success', 'User created successfully');
    }


    public function update(Request $request, Transactions $transactions)
    {
        $data = [

            'buyer_id'=>$request->input('buyer_id'),
            'seller_id'=>$request->input('seller_id'),
            'listing_id'=>$request->input('listing_id'),
            'transaction_date'=>$request->input('transaction_date'),
            'amount'=>$request->input('amount'),
        ];
        Transactions::where('id', $request['id'])->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($transactions_id)
    {
        Transactions::where('id',$transactions_id)->delete();
        return redirect()->back();
    }
}
