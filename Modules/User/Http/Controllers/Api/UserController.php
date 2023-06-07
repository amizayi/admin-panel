<?php

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Modules\Api\Http\Controllers\ApiController;
use Modules\User\Entities\User;
use Modules\User\Fields\UserFields;
use Modules\User\Http\Requests\Api\UserRequest;
use Modules\User\Transformers\UserResource;
use Modules\User\Transformers\UserResourceCollection;

class UserController extends ApiController
{
    /**
     * get list of user
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $data = User::paginate();
        return $this->successResponse(new UserResourceCollection($data), __response());
    }

    /**
     * Create User
     *
     * @param UserRequest $request
     * @return JsonResponse
     */
    public function store(UserRequest $request): JsonResponse
    {
        $inputs = $request->only($this->getRequestFields());
        $inputs[UserFields::PASSWORD] = bcrypt($inputs[UserFields::USERNAME]);

        $newUser = User::create($inputs);

        return $this->successResponse(new UserResource($newUser), __response('user','store'));
    }

    /**
     * get User by id
     *
     * @param User $user
     * @return JsonResponse
     */
    public function show(User $user): JsonResponse
    {
        return $this->successResponse(new UserResource($user));
    }

    /**
     * Update User
     *
     * @param UserRequest $request
     * @param User $user
     * @return JsonResponse
     */
    public function update(UserRequest $request, User $user): JsonResponse
    {
        $inputs = $request->only($this->getRequestFields());

        $user->update($inputs);

        return $this->successResponse(new UserResource($user), __response('user','update'));
    }

    /**
     * Delete User
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return $this->successResponse(new UserResource($user),__response('user','destroy'));
    }

    /**
     * Get Request Fields
     *
     * @return array
     */
    private function getRequestFields(): array
    {
        return [
            UserFields::USERNAME,
            UserFields::EMAIL,
            UserFields::FIRST_NAME,
            UserFields::LAST_NAME,
        ];
    }
}
