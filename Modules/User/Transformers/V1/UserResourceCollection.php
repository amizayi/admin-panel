<?php

namespace Modules\User\Transformers\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
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
            'data'       => $this->collection,
            'pagination' => formatPaginationDetails($this->resource)
        ];
    }
}
