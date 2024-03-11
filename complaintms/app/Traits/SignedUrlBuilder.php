<?php

namespace App\Traits;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

trait SignedUrlBuilder
{
    public function createSignedUrlAttachment($url,$filename): string
    {
        $file_path_name = explode('/',$url);
        $file_path_name = $file_path_name[3].'-'.$filename;
        $file_path_name = Crypt::encrypt($file_path_name);

        return URL::temporarySignedRoute('shareAttachment', now()
            ->addSeconds(Config('app.signed_url_attachment_duration')), ['file_path_name' => $file_path_name]);
    }

    public function createSignedUrlThumbnail($url, $filename)
    {
        $file_path_name = explode('/',$url);
        $file_path_name = $file_path_name[3].'-'.$filename;
        $file_path_name = Crypt::encrypt($file_path_name);


        return URL::temporarySignedRoute('shareAttachmentThumbnail', now()
            ->addSeconds(Config('app.signed_url_attachment_duration')), ['file_path_name' => $file_path_name]);
    }

}
