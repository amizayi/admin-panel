<?php

use Modules\Setting\Contracts\V1\Repositories\SettingRepository;

if (!function_exists('setting')) {
    /**
     * Get the Setting repo.
     *
     * @return SettingRepository
     */
    function setting(): SettingRepository
    {
        return resolve(SettingRepository::class);
    }
}
