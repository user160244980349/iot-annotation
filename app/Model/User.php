<?php

namespace App\Model;

use App\Core\Database;
use PDOStatement;

/**
 * User.php
 *
 * Class that provides user model, who use application.
 */
class User
{
    /**
     * Gets collection with info
     *
     * @param Database $db
     * @param array $user
     * @access public
     */
    public static function add (Database $db, array $user)
    {
        $queryString = "insert into user (";
        foreach ($user as $key => $value) {
            $queryString = "$queryString $key, ";
        }
        $queryString = substr($queryString, 0, -2);
        $queryString = "$queryString ) values (";
        foreach ($user as $key => $value) {
            $queryString = "$queryString '$value', ";
        }
        $queryString = substr($queryString, 0, -2);
        $queryString = "$queryString )";
        $db->query($queryString);
    }

    /**
     * Gets collection with info
     *
     * @param Database $db
     * @param $username
     * @return false|PDOStatement
     * @access public
     */
    public static function get (Database $db, $username)
    {
        return $db->query("select * from user where user_name = '$username'")->fetch();
    }

}
