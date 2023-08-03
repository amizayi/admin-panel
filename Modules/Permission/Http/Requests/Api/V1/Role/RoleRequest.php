<?php

namespace Modules\Permission\Http\Requests\Api\V1\Role;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Permission\Entities\V1\Role\RoleFields;

class RoleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        // Get the ID of the current role to check for duplicates
        $roleId = $this->role?->id;
        return [
            RoleFields::NAME      => 'required|min:4|unique:roles,'. RoleFields::NAME .','.$roleId,
            RoleFields::TITLE     => 'required|min:3',
            RoleFields::PARENT_ID => 'nullable|exists:roles,id',
        ];
    }
}
