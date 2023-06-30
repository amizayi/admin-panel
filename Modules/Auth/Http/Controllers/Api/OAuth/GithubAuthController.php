<?php

namespace Modules\Auth\Http\Controllers\Api\OAuth;


use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Modules\Api\Http\Controllers\ApiController;

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
            $userData = collect($response->attributes);
            // TODO: check user and login
            return $this->successResponse($userData);
        } catch (ClientException $exception) {
            return $this->errorResponse(null,'Invalid credentials provided.',422);
        }
    }
}
