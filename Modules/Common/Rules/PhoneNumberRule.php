<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberRule implements Rule
{
    private $msg = '';

    public function passes($attribute, $value)
    {
        if (strlen($value) != 11) {
            $this->msg = "The $attribute should be 11 digits";
            return false;
        }
        if (!preg_match('/^[0][0-9]*$/', $value)) {
            $this->msg = "The $attribute is invalid format";
            return false;
        }
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
