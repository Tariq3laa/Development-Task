<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArabicDescriptionRule implements Rule
{
    private $msg = '';

    public function passes($attribute, $value)
    {
        if (!preg_match('/^(?=.*?[أ-ي])[^a-zA-Z]+$/', $value)) { 
            $this->msg = 'Arabic description format invalid';
            return false;
        } 
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
