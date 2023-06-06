<?php

namespace Modules\User\Transformers\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\User\Fields\UserFields;

class UserResource extends JsonResource
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
            'id'         => $this->{UserFields::ID},
            'username'   => $this->{UserFields::USERNAME},
            'first_name' => $this->{UserFields::FIRST_NAME},
            'last_name'  => $this->{UserFields::LAST_NAME},
            'full_name'  => $this->{UserFields::FULL_NAME},
            'email'      => $this->{UserFields::EMAIL},
            'created_at' => jdate($this->{UserFields::CREATED_AT})->ago(),
        ];
    }
}
