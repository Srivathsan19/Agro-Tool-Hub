<?php

/*class Database
{

    private static $instance = null;

    /**
     * @return object $instance
     */
    /*public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new mysqli('localhost', 'root', '', 'shopping');
        }
        return self::$instance;
    }

}*/

$db = new mysqli('localhost', 'root', '', 'agrotools');

