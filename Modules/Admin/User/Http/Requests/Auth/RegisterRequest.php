<?php

namespace Modules\Admin\User\Http\Requests\Auth;

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
            'email'         => 'required|email:rfc,dns|unique:admins,email',
            'password'      => 'required|confirmed|min:6'
        ];
    }
}
