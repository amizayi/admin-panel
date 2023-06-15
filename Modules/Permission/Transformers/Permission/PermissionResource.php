<?php

namespace Modules\Permission\Transformers\Permission;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Permission\Fields\PermissionFields;
use Modules\Permission\Fields\RoleFields;

class PermissionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            PermissionFields::ID          => $this->{PermissionFields::ID},
            PermissionFields::NAME        => $this->{PermissionFields::NAME},
            PermissionFields::TITLE       => $this->{PermissionFields::TITLE},
            PermissionFields::PARENT_ID   => $this->{PermissionFields::PARENT_ID},
            PermissionFields::PARENT_NAME => $this->parent?->{PermissionFields::NAME},
            PermissionFields::CHILDREN    => $this->children,
        ];
    }
}
