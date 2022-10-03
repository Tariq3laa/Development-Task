<?php

namespace Modules\Website\User\Http\Requests\Auth;

use Modules\Common\Http\Requests\ResponseShape;

class RegisterRequest extends ResponseShape
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|min:2',
            'email'         => 'required|email:rfc,dns|unique:clients,email',
            'password'      => 'required|confirmed|min:6',
            'job_id'        => 'required|exists:jobs,id'
        ];
    }
}
