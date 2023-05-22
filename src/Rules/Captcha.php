<?php

namespace iLzx\AdminStarter\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cache;

class Captcha implements Rule
{
    protected $redomstr;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($redomstr)
    {
        $this->redomstr = $redomstr;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $phrase = Cache::get('phrase'.$this->redomstr);

        return $phrase && strtolower($phrase) == strtolower($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '验证码错误.';
    }
}
