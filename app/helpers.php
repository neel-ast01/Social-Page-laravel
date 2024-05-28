<?php

if (!function_exists('is_external_url')) {
    function is_external_url($url)
    {
        return filter_var($url, FILTER_VALIDATE_URL) && !preg_match('/' . preg_quote(url('/'), '/') . '/', $url);
    }
}