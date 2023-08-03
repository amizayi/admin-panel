<?php

namespace Modules\User\Transformers\V1\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\User\Entities\V1\User\UserFields;

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
            'data' => $this->collection->map(fn($record) => [
                UserFields::ID         => $record->{UserFields::ID},
                UserFields::USERNAME   => $record->{UserFields::USERNAME},
                UserFields::FULL_NAME  => $record->{UserFields::FULL_NAME},
                UserFields::EMAIL      => $record->{UserFields::EMAIL},
                UserFields::MOBILE     => $record->{UserFields::MOBILE},
                UserFields::CREATED_AT => $record->{UserFields::CREATED_AT},
            ]),
            'pagination' => formatPaginationDetails($this->resource)
        ];
    }
}
