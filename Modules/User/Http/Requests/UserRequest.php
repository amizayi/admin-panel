<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Api\Traits\ApiResponseTrait;

class UserRequest extends FormRequest
{
    use ApiResponseTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'username' => 'required|min:4',
            'email'    => 'required|email|unique:users,email'
        ];
    }
}
