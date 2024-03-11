<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages=Messages::all();
        return view('dashboard.pages.messages',compact('messages'));
    }


    public function store(Request $request)
    {
        $data = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'subject'=>$request->input('subject'),
            'message_content'=>$request->input('message_content'),
        ];
        Messages::create($data);
        return redirect()->back()->with('success', 'Messages created successfully');
    }

    /**
     * Display the specified resource.
     */

    public function update(Request $request, Messages $messages)
    {
        $data = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'subject'=>$request->input('subject'),
            'message_content'=>$request->input('message_content'),
        ];
        Messages::where('id', $request['id'])->update($data);
        return redirect()->back()->with('success', 'Messages uodated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($messages_id)
    {
        Messages::where('id',$messages_id)->delete();
        return redirect()->back()->with('success', 'Messages deleted successfully');
    }
}
