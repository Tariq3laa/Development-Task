<?php

namespace Modules\Common\Http\Requests;

use App\Http\Requests\ResponseShape;

class UploadRequest extends ResponseShape
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'selectedFile' => 'required',
            // 'selectedFile' => 'required|max:25096|mimes:jpg,png,jpeg,gif',
        ];
    }
}
