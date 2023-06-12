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
                'id'    => $parent->{PermissionFields::ID},
                'key'   => $parent->{PermissionFields::NAME},
                'title' => $parent->{PermissionFields::TITLE},

                'children' => $parent->children->map(fn($permission) => [
                    'id'    => $permission->{PermissionFields::ID},
                    'key'   => $permission->{PermissionFields::NAME},
                    'title' => $permission->{PermissionFields::TITLE},
                ])
            ])
        ];
    }
}
