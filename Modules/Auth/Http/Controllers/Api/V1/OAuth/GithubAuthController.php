<?php

namespace Modules\Auth\Http\Controllers\Api\V1\OAuth;


use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Modules\Global\Http\Controllers\Api\V1\ApiController;

class GithubAuthController extends ApiController
{
    public function redirect()
    {
        $url =  Socialite::driver('github')->stateless()->redirect()->getTargetUrl();
        return $this->successResponse($url);
    }

    public function callback(Request $request)
    {
        try {
            $response = Socialite::driver('github')->stateless()->user();
            $userData = collect($response);
            // TODO: check user and login
            return $this->successResponse($userData);
        } catch (ClientException $exception) {
            return $this->errorResponse(null,'Invalid credentials provided.',422);
        }
    }
}
