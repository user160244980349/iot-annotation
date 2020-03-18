<?php

namespace App\Model;

use PDOStatement;
use App\Core\ServiceBus;

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
    public static function add (array $user)
    {

        $query_string = "insert into user (user_name,user_password,user_email) values ('" .
                        $user['user_name'] . "','" .
                        $user['user_password'] . "','" .
                        $user['user_email'] . "')";

        return ServiceBus::get('database')->query($query_string);
    }

    /**
     * Gets collection with info
     *
     * @param Database $db
     * @param $username
     * @return false|PDOStatement
     * @access public
     */
    public static function getByName (string $username)
    {
        $query_string = "select * from user where user_name = '$username'";

        return ServiceBus::get('database')->query($query_string)->fetch();
    }

    /**
     * Gets collection with info
     *
     * @param Database $db
     * @param $username
     * @return false|PDOStatement
     * @access public
     */
    public static function getById (int $id)
    {
        $query_string = "select * from user where user_id = '$id'";

        return ServiceBus::get('database')->query($query_string)->fetch();
    }

    /**
     * Gets collection with info
     *
     * @param Database $db
     * @param $username
     * @return false|PDOStatement
     * @access public
     */
    public static function getAll ()
    {
        $query_string = "select * from user";

        return ServiceBus::get('database')->query($query_string)->fetchAll();
    }

}
