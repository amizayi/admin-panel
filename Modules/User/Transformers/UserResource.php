<?php

namespace Modules\User\Transformers;

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
            UserFields::ID         => $this->{UserFields::ID},
            UserFields::USERNAME   => $this->{UserFields::USERNAME},
            UserFields::FIRST_NAME => $this->{UserFields::FIRST_NAME},
            UserFields::LAST_NAME  => $this->{UserFields::LAST_NAME},
            UserFields::FULL_NAME  => $this->{UserFields::FULL_NAME},
            UserFields::EMAIL      => $this->{UserFields::EMAIL},
            UserFields::MOBILE     => $this->{UserFields::MOBILE},
            UserFields::CREATED_AT => jdate($this->{UserFields::CREATED_AT})->ago(),
        ];
    }
}
