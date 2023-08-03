<?php

namespace Modules\Permission\Transformers\V1\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Permission\Entities\V1\Role\RoleFields;
use Modules\Permission\Transformers\V1\Permission\PermissionResourceCollection;

class RoleResource extends JsonResource
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
            RoleFields::ID          => $this->{RoleFields::ID},
            RoleFields::KEY         => $this->{RoleFields::NAME},
            RoleFields::TITLE       => $this->{RoleFields::TITLE},
            RoleFields::PARENT_ID   => $this->{RoleFields::PARENT_ID},
            RoleFields::PARENT_NAME => $this->parent?->{RoleFields::NAME},
            RoleFields::CHILDREN    => $this->children,
            RoleFields::PERMISSIONS => new PermissionResourceCollection($this->permissions)
        ];
    }
}
