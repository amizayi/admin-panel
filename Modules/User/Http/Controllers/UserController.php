<?php

namespace Modules\User\Http\Controllers;

use Modules\Api\Http\Controllers\ApiController;
use Modules\User\Entities\User;
use Modules\User\Transformers\UserResourceCollection;


class UserController extends ApiController
{
    public function index()
    {
        $data = User::paginate();
        return $this->successResponse(new UserResourceCollection($data), "list of users");
    }

    public function show(User $user)
    {
        return $this->successResponse($user);
    }
}
