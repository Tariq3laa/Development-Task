<?php

namespace Modules\Common\Http\Requests;

use App\Http\Requests\ResponseShape;

class UploadOtherRequest extends ResponseShape
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'selectedFile' => 'required|max:25096|mimes:pdf,csv,xlsx,xls,doc,docx',
        ];
    }
}
