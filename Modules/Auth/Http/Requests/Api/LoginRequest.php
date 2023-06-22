<?php

namespace Modules\Auth\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Fields\AuthFields;
use Modules\User\Fields\UserFields;

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
            AuthFields::USERNAME => 'required|exists:users,'.UserFields::USERNAME,
            AuthFields::PASSWORD => 'required',
        ];
    }
}
