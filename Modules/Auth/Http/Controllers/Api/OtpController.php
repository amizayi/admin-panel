<?php

namespace Modules\Auth\Http\Controllers\Api;

use Modules\Auth\Fields\OtpFields;
use Modules\Auth\Http\Requests\Api\VerifyRequest;
use Modules\Api\Http\Controllers\ApiController;
use Modules\Auth\Http\Requests\Api\OTPRequest;
use Modules\Auth\Services\OtpGenerator;

class OtpController extends ApiController
{
    public function send(OtpRequest $request)
    {
        $result  = (new OtpGenerator())->sendCode($request->{OtpFields::MOBILE}, $request->{OtpFields::EMAIL});
        $message = $result ? __("auth::response.otp_send_success") : __("auth::response.otp_send_failed");

        return $this->successResponse($result,$message);
    }

    public function verify(VerifyRequest $request)
    {
        $result  = (new OtpGenerator())->verify($request->all());
    }
}
