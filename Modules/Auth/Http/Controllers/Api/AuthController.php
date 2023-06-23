<?php

namespace Modules\Auth\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Api\Http\Controllers\ApiController;
use Modules\Auth\Http\Requests\Api\LoginRequest;
use Modules\Auth\Traits\AuthTrait;
use Modules\Permission\Transformers\Role\RoleResource;
use Modules\User\Transformers\UserResource;

class AuthController extends ApiController
{
    use AuthTrait;

    /**
     * Logs in a user.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('username', 'password')))
            return $this->matchError();

        // Authentication was successful, set Sanctum token
        $user  = Auth::user();
        $token = $this->generateToken($user);
        $role  = $user->roles()->with('permissions')->first();

        return $this->successResponse([
            'token' => $token,
            'user'  => new UserResource($user),
            'role'  => new RoleResource($role)

        ], __('auth::response.login'));
    }
}
