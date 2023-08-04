<?php

namespace Modules\User\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use Modules\Api\Http\Controllers\Api\V1\ApiController;
use Modules\User\Transformers\V1\Profile\ProfileResource;

class ProfileController extends ApiController
{
    public function info()
    {
        return $this->successResponse(
            new ProfileResource(auth()->user()),
            __('get user info')
        );
    }
}
