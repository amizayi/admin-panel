<?php

namespace Modules\Permission\Transformers\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Permission\Fields\RoleFields;

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
            'id'          => $this->{RoleFields::ID},
            'key'         => $this->{RoleFields::NAME},
            'title'       => $this->{RoleFields::TITLE},
            'parent_id'   => $this->{RoleFields::PARENT_ID},
            'parent_name' => $this->parent?->{RoleFields::NAME},
            'children'    => $this->children,
            'permissions' => $this->permissions
        ];
    }
}
