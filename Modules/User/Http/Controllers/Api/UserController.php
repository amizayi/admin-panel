<?php

namespace Modules\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Modules\User\Fields\UserFields;
use Modules\User\Transformers\UserResource;
use Modules\Api\Http\Controllers\ApiController;
use Modules\User\Http\Requests\Api\UserRequest;
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
        $data = user()->paginate();
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

        // create user
        $newUser = user()->create($inputs);
        // assign roles to user
        $newUser->roles()->attach($request->input(UserFields::ROLES));

        return $this->successResponse(new UserResource($newUser), __response('user','store'));
    }

    /**
     * get User by id
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id): JsonResponse
    {
        $user = user()->find($id);
        return $this->successResponse(new UserResource($user));
    }

    /**
     * Update User
     *
     * @param UserRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UserRequest $request, $id): JsonResponse
    {
        $inputs = $request->only($this->getRequestFields());
        // update user
        $user = user()->update($inputs,$id);
        // sync roles to user
        $user->roles()->sync($request->input(UserFields::ROLES));

        return $this->successResponse(new UserResource($user), __response('user','update'));
    }

    /**
     * Delete User
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $user = user()->delete($id);
        return $this->successResponse($user,__response('user','destroy'));
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
            UserFields::MOBILE,
            UserFields::FIRST_NAME,
            UserFields::LAST_NAME,
        ];
    }
}
