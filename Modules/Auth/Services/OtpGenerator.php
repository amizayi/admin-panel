<?php

namespace Modules\Auth\Services;

use Illuminate\Support\Facades\Cache;

class OtpGenerator
{
    /**
     * The length of the generated OTP (One-Time Password).
     *
     * @var int
     */
    private int $otp_length = 4;

    /**
     * The expiration time (in seconds) for the OTP.
     *
     * @var int
     */
    private int $otp_expire_time = 120;

    /**
     * Send an OTP code to the specified mobile number or email address.
     *
     * @param string|null $mobile
     * @param string|null $email
     * @return bool
     */
    public function sendCode(?string $mobile, ?string $email): bool
    {
        $recipient = $mobile ?? $email;
        // Generate a new OTP code
        $otp = $this->generateCode();
        // send code
        $result = $mobile ? $this->sendSMS($mobile, $otp) : $this->sendEmail($email, $otp);
        // The expiration time
        $expiration = now()->addSecond($this->otp_expire_time);
        // Store OTP in cache
        return $result && Cache::put(cacheOtpKey($recipient), $otp, $expiration);
    }

    /**
     * Verify the given code for the recipient.
     *
     * @param string $recipient
     * @param string $code
     * @return bool
     */
    public function verify(string $recipient, string $code): bool
    {
        $cacheKey = cacheOtpKey($recipient);

        return Cache::get($cacheKey) == $code && Cache::forget($cacheKey);
    }

    /**
     * Generates a random OTP (One-Time Password) consisting of digits.
     *
     * @return string The generated OTP.
     */
    private function generateCode(): string
    {
        $code = '';

        for ($i = 0; $i < $this->otp_length; $i++)
            $code .= rand(0, 9);

        return $code;
    }

    /**
     * Sends an OTP code via email.
     *
     * @param mixed $email The email address to send the OTP code to.
     * @param string $otp The OTP code to be sent.
     * @return bool Returns true if the email was successfully sent, false otherwise.
     */
    private function sendEmail(mixed $email, string $otp): bool
    {
        return true;
    }

    /**
     * Sends an OTP code via SMS.
     *
     * @param string $mobile The mobile number to send the OTP code to.
     * @param string $otp The OTP code to be sent.
     * @return bool Returns true if the SMS was successfully sent, false otherwise.
     */
    private function sendSMS(string $mobile, string $otp): bool
    {
        return true;
    }
}
