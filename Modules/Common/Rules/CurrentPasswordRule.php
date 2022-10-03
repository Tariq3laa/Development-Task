<?php

namespace Modules\Common\Rules;

use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Rule;

class CurrentPasswordRule implements Rule
{
    private $msg = '';
    private $guard = '';

    public function __construct($guard) {
        $this->guard = $guard;
    }

    public function passes($attribute, $value)
    {
        if(!Hash::check($value, auth($this->guard)->user()->password)) {
            $this->msg = 'incorrect current password';
            return false;
        }
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
