<?php

//region Installation Status
if (!function_exists('installed'))
{
    /**
     * Return app installed or not status
     */
    function installed(): bool
    {
        return (bool)config('core.config.installed') === true;
    }
}

if (!function_exists('not_installed'))
{
    /**
     * Return app installed or not status
     */
    function not_installed(): bool
    {
        return (bool)config('core.config.installed') === false;
    }
}
//endregion

//region Get Attributes
if (!function_exists('attributes'))
{
    /**
     * Get module translation attributes.
     */
    function attributes(string $module): array
    {
        return __("$module::attributes") ?? [];
    }
}
//endregion
