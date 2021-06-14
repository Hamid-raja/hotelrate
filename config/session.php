<?php
/**
 * common class 
 * use for Session
 *  
 **/
class Session
{

    /**
     * start sessions
     */
    public static function init()
    {
       session_start();
    }

    /**
     * set seesions
     */
    public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }

    /**
     * get session values and return
     */
    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    /**
     * check session for admin
     */
    public static function checkSession()
    {
        self::init();
        if (self::get("adminlogin") == false) {
            self::destroy();
            header("Location:login.php");
        }
    }

    /**
     * check login and redirect for admin
     */
    public static function checkLogin()
    {
        self::init();
        if (self::get("adminlogin") == true) {
            header("Location:dashboard.php");
        }
    }

    /**
     * destroy sessions 
     */
    public static function destroy()
    {
        session_destroy();
        echo "<script>window.location = 'login.php';</script>";
        
    }
}
