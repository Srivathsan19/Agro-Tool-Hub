<?php

class Session
{
    public function __construct()
    {
        session_start();
    }

    public static function set($key, $value): bool
    {

        if (!$key || !$value) {
            return false;
        }

        return $_SESSION[$key] = $value;
    }

    public static function get($key): string
    {

        if (!isset($_SESSION[$key])) {
            return false;
        }

        return $_SESSION[$key];
    }

    public static function delete($key): bool
    {

        if (!isset($_SESSION[$key])) {
            return false;
        }

        unset($_SESSION[$key]);
        return true;
    }
}