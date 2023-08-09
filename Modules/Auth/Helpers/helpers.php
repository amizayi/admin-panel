<?php


if (!function_exists('cache_otp_key')) {
    /**
     * Get the Role repo.
     *
     * @param string $recipient
     * @return string
     */
    function cache_otp_key(string $recipient): string
    {
        return "OTP:$recipient";
    }
}
