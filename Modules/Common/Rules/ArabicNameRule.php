<?php

namespace Modules\Common\Rules;

use Illuminate\Contracts\Validation\Rule;

class ArabicNameRule implements Rule
{
    private $msg = '';

    private $is_contain_number;

    public function __construct($is_contain_number = false)
    {
        $this->is_contain_number = $is_contain_number;
    }

    public function passes($attribute, $value)
    {
        if ($this->is_contain_number && !preg_match('/^[\x{0621}-\x{063A}\x{0641}-\x{064A}\s0-9]+$/u', $value)) { // is used with product validation
            $this->msg = trans('index.Arabic_name_format_invalid');
            return false;
        } else if (!$this->is_contain_number && !preg_match('/^[\x{0621}-\x{063A}\x{0641}-\x{064A}\s]+$/u', $value)) {
            $this->msg = trans('index.Arabic_name_format_invalid');
            return false;
        }
        return true;
    }

    public function message()
    {
        return $this->msg;
    }
}
