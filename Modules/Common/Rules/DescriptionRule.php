<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class DescriptionRule implements Rule
{
    private $msg = '';

    public function passes($attribute, $value)
    {
        if (!preg_match('/(?=.*?[A-Za-z]).+/', $value) && !preg_match('/^[\x{0621}-\x{063A}\x{0641}-\x{064A}\s0-9]+$/u', $value)) { 
            $this->msg = 'Description format invalid';
            return false;
        } 
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
