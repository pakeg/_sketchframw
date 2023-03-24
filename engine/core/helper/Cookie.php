<?php

namespace engine\core\helper;

class Cookie
{
    public static function set($key, $val, $time = 31536000)
    {
        setcookie($key, $val, time() + $time, '/');
    }

    public static function get($key)
    {
        if (isset($_COOKIE[$key])):
            return $_COOKIE[$key];
        endif;

        return null;
    }

    public static function delete($key)
    {
        if (isset($_COOKIE[$key])):
            self::set($key, '', -3600);
            unset($_COOKIE[$key]);
        endif;
    }
}