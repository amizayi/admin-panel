<?php

namespace Modules\User\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Global\Http\Controllers\Api\V1\ApiController;
use Modules\User\Entities\V1\User\UserFields;
use Modules\User\Transformers\V1\Profile\ProfileResource;

class ProfileController extends ApiController
{
    /**
     * Get Authenticated User Info
     *
     * @return JsonResponse
     */
    public function info(): JsonResponse
    {
        return $this->successResponse(
            new ProfileResource(auth()->user()),
            __response()
        );
    }

    /**
     * Update Authenticated User Info
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $user   = auth()->user();

        $inputs = $request->only($this->getRequestFields());

        $user->update($inputs);

        return $this->successResponse(
            new ProfileResource($user),
            __response("profile", "update")
        );
    }

    /**
     * Get Request Constants
     *
     * @return array
     */
    private function getRequestFields(): array
    {
        return [
            UserFields::USERNAME,
            UserFields::EMAIL,
            UserFields::MOBILE,
            UserFields::FIRST_NAME,
            UserFields::LAST_NAME,
        ];
    }
}
