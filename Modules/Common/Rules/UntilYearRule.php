<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class UntilYearRule implements Rule
{
    private $msg = '';

    public function passes($attribute, $value)
    {
        if (date("Y") > $value) { 
            $this->msg = 'Until year can\'t be less than ' . date("Y");
            return false;
        } 
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
