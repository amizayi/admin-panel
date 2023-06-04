<?php

namespace Modules\User\Transformers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

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
            'pagination' => [
                'total'          => $this->total(),
                'from'           => $this->firstItem(),
                'to'             => $this->lastItem(),
                'per_page'       => $this->perPage(),
                'current_page'   => $this->currentPage(),
                'last_page'      => $this->lastPage(),
                'first_page_url' => $this->url(1),
                'prev_page_url'  => $this->previousPageUrl(),
                'next_page_url'  => $this->nextPageUrl(),
                'last_page_url'  => $this->url($this->lastPage()),
                'default_path'   => $this->path(),
            ],
        ];
    }
}
