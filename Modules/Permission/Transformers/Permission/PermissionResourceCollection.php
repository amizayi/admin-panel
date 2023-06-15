<?php

namespace Modules\Permission\Transformers\Permission;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Permission\Fields\PermissionFields;

class PermissionResourceCollection extends ResourceCollection
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
                PermissionFields::ID    => $parent->{PermissionFields::ID},
                PermissionFields::KEY   => $parent->{PermissionFields::NAME},
                PermissionFields::TITLE => $parent->{PermissionFields::TITLE},

                PermissionFields::CHILDREN => $parent->children->map(fn($permission) => [
                    PermissionFields::ID    => $permission->{PermissionFields::ID},
                    PermissionFields::KEY   => $permission->{PermissionFields::NAME},
                    PermissionFields::TITLE => $permission->{PermissionFields::TITLE},
                ])
            ])
        ];
    }
}
