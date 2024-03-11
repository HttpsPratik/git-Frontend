<?php

namespace App\Service;

use App\Exceptions\ErrorPageException;
use App\Repository\Interfaces\AttachmentRepositoryInterface;
use App\Traits\Helper;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Symfony\Component\Mime\MimeTypes;
use Illuminate\Support\Facades\Log;



class AttachmentService
{
    use Helper;

    public function __construct(private AttachmentRepositoryInterface $attachmentRepository)
    {
    }

    public function saveAttachments(array $request, string $conversation_id): void
    {
        $attachments = $request['attachments'] ?? [];

        if (!$this->arrayHasFile($attachments)) {
            return;
        }

        $monthYear = now()->format('Y-m');
        $storagePath = Storage::url("attachments/$monthYear");

        $data_array = [];
        foreach ($attachments as $attachment) {
            $fileName = $this->saveFile($attachment, $monthYear);
            $data_array[] = [
                'id' => (string) Str::orderedUuid(),
                'conversation_id' => $conversation_id,
                'url' => json_encode(['path' => $storagePath, 'name' => $fileName]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $this->attachmentRepository->insertMany($data_array);
    }


    private function saveFile($attachment, $monthYear): string
    {
        $fileName = "f_" . uniqid();
        //$file_path = storage_path("app/public/attachments/$monthYear/uploads");
        //$thumbnail_path = storage_path("app/public/attachments/$monthYear/thumbnails");

        $file_path = public_path("storage/attachments/$monthYear/uploads");
        $thumbnail_path = public_path("storage/attachments/$monthYear/thumbnails");

        if (!Storage::disk('public')->exists("attachments/$monthYear/uploads")) {
            Storage::disk('public')->makeDirectory("attachments/$monthYear/uploads");
        }

        if (!Storage::disk('public')->exists("attachments/$monthYear/thumbnails")) {
            Storage::disk('public')->makeDirectory("attachments/$monthYear/thumbnails");
        }

        $mimeTypes = new MimeTypes();
        $mimeType = $mimeTypes->guessMimeType($attachment);
        $clientOriginalExtension = $mimeTypes->getExtensions($mimeType)[0];

        $compressibleFileTypes = ['jpg', 'png', 'gif', 'tif', 'bmp', 'ico', 'psd', 'webp', 'jpeg'];
        $nonCompressibleFileTypes = ['pdf', 'pptx', 'ppt', 'doc', 'docx', 'xls', 'xlsx'];

        if (in_array($clientOriginalExtension, $compressibleFileTypes)) {
            try {
                Image::make($attachment)
                    ->interlace()
                    ->orientate()
                    ->resize(1920, 1080, fn($constraint) => $constraint->aspectRatio())
                    ->encode($clientOriginalExtension, 66.7)
                    ->save("$file_path/$fileName.$clientOriginalExtension")
                    ->resize(150, 150, fn($constraint) => $constraint->aspectRatio())
                    ->save("$thumbnail_path/$fileName.$clientOriginalExtension");
                $fileName = "$fileName.$clientOriginalExtension";
            } catch (\Exception $ex) {
                Log::alert($ex->getMessage());
                throw new ErrorPageException('Cannot Save Image', 500);
            }
        } elseif (in_array($clientOriginalExtension, $nonCompressibleFileTypes)) {
            $fileName = "$fileName.$clientOriginalExtension";
            $attachment->move($file_path, $fileName);
        } else throw new ErrorPageException('Invalid File', 500);

        // try {
        //     $img = Image::make($attachment);
        //     $img->interlace()
        //         ->resize(1920, 1080, function ($constraint) {
        //             $constraint->aspectRatio();
        //         })
        //         ->orientate()
        //         ->encode('jpeg', 66.7);
        //     $img->save("$file_path/$fileName.jpg");
        //     $img->resize(150, 150, function ($constraint) {
        //         $constraint->aspectRatio();
        //     });
        //     $img->save("$thumbnail_path/$fileName.jpg");
        //     $fileName .= '.jpg';
        // } catch (NotReadableException $ex) {
        //     $mimeTypesInstance = new \Mimey\MimeTypes;
        //     $mimeType = $attachment->getMimetype();
        //     $clientOriginalExtension = $mimeTypesInstance->getExtension($mimeType);
        //     $fileName .= '.' . $clientOriginalExtension;
        //     $attachment->move($file_path, $fileName);
        // }

        return $fileName;
    }
}
