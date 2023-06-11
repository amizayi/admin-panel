<?php

namespace Modules\Permission\Transformers\Role;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Permission\Fields\RoleFields;

class RoleResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(fn($parent) => [
                'id'    => $parent->{RoleFields::ID},
                'key'   => $parent->{RoleFields::NAME},
                'title' => $parent->{RoleFields::TITLE},

                'children' => $parent->children->map(fn($role) => [
                    'id'    => $role->{RoleFields::ID},
                    'key'   => $role->{RoleFields::NAME},
                    'title' => $role->{RoleFields::TITLE},
                ])
            ])
        ];
    }
}
