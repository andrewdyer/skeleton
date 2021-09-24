<?php

if (!function_exists('base_path')) {
    function base_path($path = ''): string
    {
        return __DIR__ . '/..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}

if (!function_exists('get_env')) {
    function get_env($key, $default = null)
    {
        if (isset($_ENV[$key])) {
            $value = $_ENV[$key];

            switch (strtolower($value)) {
                case 'true' === $value:
                    return true;

                case 'false' === $value:
                    return false;

                default:
                    return $value;
            }
        }

        return $default;
    }
}
