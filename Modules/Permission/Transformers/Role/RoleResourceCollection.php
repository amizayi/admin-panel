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
                RoleFields::ID    => $parent->{RoleFields::ID},
                RoleFields::KEY   => $parent->{RoleFields::NAME},
                RoleFields::TITLE => $parent->{RoleFields::TITLE},

                RoleFields::PERMISSIONS => $parent->children->map(fn($role) => [
                    RoleFields::ID    => $role->{RoleFields::ID},
                    RoleFields::KEY   => $role->{RoleFields::NAME},
                    RoleFields::TITLE => $role->{RoleFields::TITLE},
                ])
            ])
        ];
    }
}
