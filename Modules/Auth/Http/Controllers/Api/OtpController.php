<?php

namespace Modules\Auth\Http\Controllers\Api;

use Modules\Api\Http\Controllers\ApiController;
use Modules\Auth\Http\Requests\Api\OTPRequest;
use Modules\Auth\Services\OtpGenerator;

class OtpController extends ApiController
{
    public function send(OtpRequest $request)
    {
        $result  = (new OtpGenerator())->sendCode($request->all());
        $message = $result ? __("auth::response.otp_send_success") : __("auth::response.otp_send_failed");

        return $this->successResponse($result,$message);
    }
}
