<?php


if (!function_exists('cacheOtpKey')) {
    /**
     * Get the Role repo.
     *
     * @param string $recipient
     * @return string
     */
    function cacheOtpKey(string $recipient): string
    {
        return "OTP:$recipient";
    }
}
