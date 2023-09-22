<?php

namespace Modules\Auth\Http\Controllers\Api\V1;

use Modules\Auth\Fields\V1\OtpFields;
use Modules\Auth\Http\Requests\Api\V1\OTPRequest;
use Modules\Auth\Http\Requests\Api\V1\VerifyRequest;
use Modules\Auth\Services\V1\OtpGenerator;
use Modules\Auth\Traits\V1\AuthTrait;
use Modules\Auth\Transformers\V1\AuthResource;
use Modules\Global\Http\Controllers\Api\V1\ApiController;

class OtpController extends ApiController
{
    use AuthTrait;

    public function send(OtpRequest $request)
    {
        $result  = (new OtpGenerator())->sendCode($request->input(OtpFields::MOBILE), $request->input(OtpFields::EMAIL));
        $message = $result ? __("auth::response.otp_send_success") : __("auth::response.otp_send_failed");

        return $this->successResponse($result, $message);
    }

    public function verify(VerifyRequest $request)
    {
        $recipient = $request->input(OtpFields::RECIPIENT);

        $result = (new OtpGenerator())->verify($recipient, $request->input(OtpFields::CODE));

        if (!$result)
            return $this->successResponse(false, __("auth::response.otp_failed"), 400);

        // check exists user
        $user = user()->where(OtpFields::EMAIL, $recipient)->orWhere(OtpFields::MOBILE, $recipient)->first();
        if (!$user) return $this->successResponse(false, __("auth::response.user_not_exists"), 401);
        // TODO: create user

        // Authentication was successful, set Sanctum token
        $token = $this->generateToken($user);

        return $this->successResponse(new AuthResource($user, $token));
    }
}
