<?php

use Modules\Setting\Repositories\Contracts\SettingRepository;

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
