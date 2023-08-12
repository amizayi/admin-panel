<?php

namespace Modules\Auth\Http\Controllers\Api\V1\OAuth;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Modules\Kernel\Http\Controllers\Api\V1\ApiController;

class FaceBookAuthController extends ApiController
{
    public function redirect()
    {
        $url =  Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl();
        return $this->successResponse($url);
    }

    public function callback(Request $request)
    {
        try {
            $response = Socialite::driver('facebook')->stateless()->user();
            $userData = collect($response);
            // TODO: check user and login
            return $this->successResponse($userData);
        } catch (ClientException $exception) {
            return $this->errorResponse(null,'Invalid credentials provided.',422);
        }
    }
}
