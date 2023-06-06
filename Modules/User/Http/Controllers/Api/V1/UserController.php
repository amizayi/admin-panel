<?php

namespace Modules\User\Http\Controllers\Api\V1;


use Modules\Api\Http\Controllers\ApiController;
use Modules\User\Entities\User;
use Modules\User\Transformers\V1\UserResource;
use Modules\User\Transformers\V1\UserResourceCollection;

class UserController extends ApiController
{
    public function index()
    {
        $data = User::paginate();
        return $this->successResponse(new UserResourceCollection($data), "list of users");
    }

    public function show(User $user)
    {
        return $this->successResponse(new UserResource($user));
    }
}
