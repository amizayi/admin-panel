<?php

namespace Modules\User\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;
use Modules\User\Entities\V1\User\UserFields;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        // Get the ID of the current user to check for duplicates
        $userId = $this->user?->id;
        return [
            UserFields::USERNAME   => 'required|min:4|unique:users,'. UserFields::USERNAME .','.$userId,
            UserFields::EMAIL      => 'required|email|unique:users,'. UserFields::EMAIL    .','.$userId,
            UserFields::FIRST_NAME => 'required|min:2',
            UserFields::LAST_NAME  => 'required|min:2',
        ];
    }
}
