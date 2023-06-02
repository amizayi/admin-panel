<?php

namespace Modules\User\Http\Controllers;

use Modules\Api\Http\Controllers\ApiController;
use Modules\User\Entities\User;


class UserController extends ApiController
{
    public function index()
    {
        $data = User::all();
        return $this->successResponse($data,"list of users");
    }
}
