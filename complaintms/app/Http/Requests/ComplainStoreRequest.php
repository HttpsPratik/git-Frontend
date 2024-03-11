<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplainStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'attachments' => 'nullable|array|max_uploaded_file_size:'.config('app.max_upload_file_size'),
            'attachments.*' => 'nullable|distinct|file|mimes:jpg,jpeg,bmp,png,ppt,pptx,doc,docx,pdf,xls,xlsx,webp|max:'.config('app.max_file_size'),
            'privacy' => 'required',
            'description' => ['required','max:2000'],
            'category_id' => 'required',
            'subject' => ['required','max:180'],
        ];
    }

    public function messages()
    {
        return [
            'attachments.*.distinct' => 'Please select distinct files !!!',
            'attachments.max_uploaded_file_size' => 'All files to be uploaded should not exceed '.(config('app.max_uploaded_file_size')/1024).' MegaBytes',
            'attachments.*.max' => 'Single File size must be below '.(config('app.max_file_size')/1024).' MegaBytes',
            'privacy.required' => 'please enter privacy',
            'description.required' => 'please enter description',
            'subject.required' => 'please enter subject',
            'category_id' => 'select a category'
        ];
    }
}
