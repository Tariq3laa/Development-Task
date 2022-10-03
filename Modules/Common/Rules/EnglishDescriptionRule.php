<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class EnglishDescriptionRule implements Rule
{
    private $msg = '';

    public function passes($attribute, $value)
    {
        if (!preg_match('/^(?=.*?[a-zA-Z])[^أ-ي]+$/', $value)) { 
            $this->msg = 'English description format invalid';
            return false;
        } 
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
