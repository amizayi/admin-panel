<?php

namespace Modules\User\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Modules\Api\Http\Controllers\ApiController;
use Modules\User\Entities\User;
use Modules\User\Fields\UserFields;
use Modules\User\Http\Requests\Api\V1\UserRequest;
use Modules\User\Transformers\V1\UserResource;
use Modules\User\Transformers\V1\UserResourceCollection;

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
        return $this->successResponse(new UserResourceCollection($data), "list of users");
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

        return $this->successResponse(new UserResource($newUser),'user created.');
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

        return $this->successResponse(new UserResource($user),'user updated.');
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
        return $this->successResponse(new UserResource($user),'user deleted.');
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
