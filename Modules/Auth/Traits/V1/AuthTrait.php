<?php

namespace Modules\Auth\Traits\V1;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

trait AuthTrait
{
    /**
     * Generate a token for the given user.
     *
     * @param User $user
     * @return string
     */
    protected function generateToken(User $user): string
    {
        return $user->createToken('auth-token')->plainTextToken;
    }

    /**
     * Return a JSON response indicating a match error with a 401 status code.
     *
     * @return JsonResponse
     */
    public function matchError(): JsonResponse
    {
        return response()->json([
            'status'  => false,
            'message' => __('auth::response.failed'),
            'error'   => __('auth::response.match_error'),
        ], Response::HTTP_UNAUTHORIZED);
    }
}
