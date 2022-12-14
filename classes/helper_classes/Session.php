<?php

class Session 
{
    public static function checkSession()
    {
        return session_status() == PHP_SESSION_ACTIVE;
    }

    public static function startSession()
    {
        if (!self::checkSession()) 
        {
            session_start();
        }
    }

    public static function destroySession()
    {
        if (self::checkSession()) 
        {
            session_destroy();
        }
    }

    public static function setSession($key, $value)
    {
        self::startSession();
        $_SESSION[$key] = $value;
    }

    public static function getSession($key)
    {
        if (self::checkSession() && isset($_SESSION[$key])) 
        {
            return $_SESSION[$key];
        }
    }

    public static function hasSession($key)
    {
        return (self::checkSession() && isset($_SESSION[$key]));
    }

    public static function unsetSession($key)
    {
        if (self::checkSession() && isset($_SESSION[$key])) 
        {
            unset($_SESSION[$key]);
        }
    }

}

?>