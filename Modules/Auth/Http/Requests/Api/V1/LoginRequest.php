<?php

namespace Modules\Auth\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Fields\V1\AuthFields;
use Modules\Kernel\Rules\CustomBooleanRule;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            AuthFields::USERNAME => 'required|exists:users,'.AuthFields::USERNAME,
            AuthFields::PASSWORD => 'required',
            AuthFields::REMEMBER => new CustomBooleanRule(),
        ];
    }
}
