<?php

namespace Modules\Kernel\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomBooleanRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return in_array(strtolower($value), ['true', 'false', 'yes', 'no', '1', '0',true, false, 0, 1,]);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute field must be a valid boolean value.';
    }
}
