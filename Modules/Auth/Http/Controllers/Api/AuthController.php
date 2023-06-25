<?php

namespace Modules\Auth\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Modules\Api\Http\Controllers\ApiController;
use Modules\Auth\Http\Requests\Api\LoginRequest;
use Modules\Auth\Traits\AuthTrait;
use Modules\Auth\Transformers\AuthResource;

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
        $user  = auth()->user();
        $token = $this->generateToken($user);

        return $this->successResponse(new AuthResource($user,$token), __('auth::response.login'));
    }

    /**
     * Revokes all the authenticated user's Sanctum tokens and logs them out.
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();
        return $this->successResponse(null, __('auth::response.logout'));
    }
}
