<?php

namespace Modules\Auth\Services;

use Modules\Auth\Fields\OtpFields;
use Illuminate\Support\Facades\Cache;

class OtpGenerator
{
    /**
     * The length of the generated OTP (One-Time Password).
     *
     * @var int
     */
    private int $otp_length      = 4;

    /**
     * The expiration time (in seconds) for the OTP.
     *
     * @var int
     */
    private int $otp_expire_time = 120;


    /**
     * Sends a verification code to the user using either email or mobile number.
     * @param array $inputs The inputs containing the email and mobile number.
     * @return bool Returns true if the verification code is successfully sent, false otherwise.
     */
    public function sendCode(array $inputs): bool
    {
        $reqValue = $inputs[OtpFields::EMAIL] ?? $inputs[OtpFields::MOBILE];
        // Generate a new OTP code
        $otp = $this->generateCode();
        // send code
        $result = match (key($inputs)) {
            OtpFields::MOBILE => $this->sendSMS($reqValue,   $otp),
            OtpFields::EMAIL  => $this->sendEmail($reqValue, $otp),
        };
        // Store OTP in cache
        if($result)
            return Cache::put(
                "OTP:$reqValue",
                $otp,
                now()->addSecond($this->otp_expire_time)
            );
        else
            return false;
    }


    /**
     * Generates a random OTP (One-Time Password) consisting of digits.
     *
     * @return string The generated OTP.
     */
    private function generateCode(): string
    {
        $code = '';

        for ($i = 0; $i < $this->otp_length; $i++) {
            $code .= rand(0, 9);
        }

        return $code;
    }

    private function sendEmail(mixed $email, string $otp): bool
    {
        return true;
    }

    private function sendSMS(mixed $mobile, string $otp): bool
    {
        return true;
    }
}
