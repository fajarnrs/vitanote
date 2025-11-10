<?php

use App\Models\SiteSetting;

if (!function_exists('setting')) {
    /**
     * Get a site setting value.
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    function setting(string $key, $default = null)
    {
        return SiteSetting::get($key, $default);
    }
}
