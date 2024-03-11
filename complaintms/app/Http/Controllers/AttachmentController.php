<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    public function shareResourceAttachment($file_path_name)
    {
        $file_path_name = Crypt::decrypt($file_path_name);
        $file_path_name = explode('-',$file_path_name);
        $file_path = $file_path_name[0].'-'.$file_path_name[1].'/uploads';
        $file_name = $file_path_name[2];

        if(File::exists(public_path('/storage/attachments/'.$file_path.'/'.$file_name))){
            return response()->file(public_path('/storage/attachments/'.$file_path.'/'.$file_name));
        } else {
            return response()->json(['error' => 'File Not Found'], 201);
        }
    }

    public function shareResourceAttachmentThumbnail($file_path_name)
    {
        $file_path_name = Crypt::decrypt($file_path_name);
        $file_path_name = explode('-',$file_path_name);
        $file_path = $file_path_name[0].'-'.$file_path_name[1].'/thumbnails';
        $file_name = $file_path_name[2];

        if(File::exists(public_path('/storage/attachments/'.$file_path.'/'.$file_name))){
            return response()->file(public_path('/storage/attachments/'.$file_path.'/'.$file_name));
        } else {
            return response()->json(['error' => 'File Not Found'], 201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        //
    }
}
