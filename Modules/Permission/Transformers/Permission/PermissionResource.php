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
            'id'          => $this->{PermissionFields::ID},
            'key'         => $this->{PermissionFields::NAME},
            'title'       => $this->{PermissionFields::TITLE},
            'parent_id'   => $this->{PermissionFields::PARENT_ID},
            'parent_name' => $this->parent?->{PermissionFields::NAME},
            'children'    => $this->children,
        ];
    }
}
