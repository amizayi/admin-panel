<?php

namespace Modules\Auth\Http\Controllers\Api;

use Modules\Auth\Http\Requests\Api\VerifyRequest;
use Modules\Api\Http\Controllers\ApiController;
use Modules\Auth\Http\Requests\Api\OTPRequest;
use Modules\Auth\Transformers\AuthResource;
use Modules\Auth\Services\OtpGenerator;
use Modules\Auth\Fields\OtpFields;
use Modules\Auth\Traits\AuthTrait;

class OtpController extends ApiController
{
    use AuthTrait;

    public function send(OtpRequest $request)
    {
        $result  = (new OtpGenerator())->sendCode($request->{OtpFields::MOBILE}, $request->{OtpFields::EMAIL});
        $message = $result ? __("auth::response.otp_send_success") : __("auth::response.otp_send_failed");

        return $this->successResponse($result, $message);
    }

    public function verify(VerifyRequest $request)
    {
        $recipient = $request->{OtpFields::RECIPIENT};
        $result = (new OtpGenerator())->verify($recipient, $request->{OtpFields::CODE});
        if (!$result) return $this->successResponse(false, __("auth::response.otp_failed"),400);

        // check exists user
        $user = user()->where(OtpFields::EMAIL, $recipient)->orWhere(OtpFields::MOBILE, $recipient)->first();
        if (!$user) return $this->successResponse(false, __("auth::response.user_not_exists"),401);
        // TODO: create user

        // Authentication was successful, set Sanctum token
        $token = $this->generateToken($user);

        return $this->successResponse(new AuthResource($user, $token));
    }
}
