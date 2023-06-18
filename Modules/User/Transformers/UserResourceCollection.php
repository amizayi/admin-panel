<?php

namespace Modules\User\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Permission\Fields\RoleFields;
use Modules\User\Fields\UserFields;
use function formatPaginationDetails;

class UserResourceCollection extends ResourceCollection
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
                UserFields::ID         => UserFields::ID,
                UserFields::USERNAME   => UserFields::USERNAME,
                UserFields::FULL_NAME  => UserFields::FULL_NAME,
                UserFields::EMAIL      => UserFields::EMAIL,
                UserFields::CREATED_AT => UserFields::CREATED_AT,
            ]),
            'pagination' => formatPaginationDetails($this->resource)
        ];
    }
}
