<?php

namespace Modules\Auth\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Fields\AuthFields;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            AuthFields::USERNAME => 'required|unique:users,'.AuthFields::USERNAME,
            AuthFields::PASSWORD => 'required|confirmed',
            AuthFields::EMAIL    => 'required|unique:users,'.AuthFields::EMAIL
        ];
    }
}
