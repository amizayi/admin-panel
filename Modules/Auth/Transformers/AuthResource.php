<?php

namespace Modules\Auth\Transformers;

use Illuminate\Http\Request;
use Modules\Auth\Fields\AuthFields;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Permission\Transformers\Role\RoleResource;
use Modules\User\Transformers\UserResource;

class AuthResource extends JsonResource
{
    /**
     *
     * The authentication token for the user.
     * @var string $token
     */
    private string $token;
    /**
     *
     * The authenticated user.
     * @var mixed $user
     */
    private mixed $user;

    /**
     *
     *  Create a new AuthResource instance.
     * @param mixed $user
     * @param string|null $token
     */
    public function __construct(mixed $user, string $token = null)
    {
        parent::__construct($user);
        $this->user  = $user;
        $this->token = $token;
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray(Request $request): array
    {
        return [
            AuthFields::TOKEN => $this->token,
            AuthFields::USER  => new UserResource($this->user),
            AuthFields::ROLE  => new RoleResource($this->user->roles()->with('permissions')->first())
        ];
    }
}
