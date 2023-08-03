<?php

namespace Modules\Auth\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Api\Http\Controllers\Api\V1\ApiController;
use Modules\Auth\Fields\V1\AuthFields;
use Modules\Auth\Http\Requests\Api\V1\LoginRequest;
use Modules\Auth\Http\Requests\Api\V1\RegisterRequest;
use Modules\Auth\Traits\V1\AuthTrait;
use Modules\Auth\Transformers\V1\AuthResource;

class BasicAuthController extends ApiController
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
        if (!Auth::attempt($request->only(AuthFields::USERNAME, AuthFields::PASSWORD),$request->boolean(AuthFields::REMEMBER)))
            return $this->matchError();

        // Authentication was successful, set Sanctum token
        $user  = auth()->user();
        $token = $this->generateToken($user);

        return $this->successResponse(new AuthResource($user,$token), __('auth::response.login'));
    }

    /**
     * Register a new user.
     *
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $inputs = $request->only(AuthFields::USERNAME, AuthFields::PASSWORD, AuthFields::EMAIL);

        // Hash the password before storing it in the database
        $inputs[AuthFields::PASSWORD] = Hash::make($inputs[AuthFields::PASSWORD]);
        // Create a new user with the given inputs
        $user = user()->create($inputs);
        // Login the user
        Auth::login($user);
        // Generate an authentication token for the user
        $token = $this->generateToken($user);

        return $this->successResponse(new AuthResource($user,$token),__('auth::response.register_success'));
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
