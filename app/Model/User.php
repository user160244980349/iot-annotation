<?php

namespace App\Model;

use PDOStatement;
use App\Object\ServiceBus;

/**
 * User.php
 *
 * Class that provides user model.
 */
class User
{

    /**
     * Adds new user into database.
     *
     * @param array $user.
     * @access public
     */
    public static function add (array $user)
    {

            $query_string = "INSERT INTO `users` (
                                `name`,
                                `password`,
                                `email`
                            ) VALUES (
                                '{$user['name']}',
                                '{$user['password']}',
                                '{$user['email']}'
                            )";

            return ServiceBus::get('database')->query($query_string);
    }

    /**
     * Gets array with info.
     *
     * @param $username.
     * @return false|PDOStatement.
     * @access public.
     */
    public static function getByName (string $name)
    {
        $query_string = "SELECT * FROM `users` WHERE `name` = '$name'";

        return ServiceBus::get('database')->query($query_string)->fetch();
    }

    /**
     * Gets array with info.
     *
     * @param int $id.
     * @return false|PDOStatement.
     * @access public.
     */
    public static function getById (int $id)
    {
        $query_string = "SELECT * FROM `users` WHERE `id` = '$id'";

        return ServiceBus::get('database')->query($query_string)->fetch();
    }

    /**
     * Gets array with info.
     *
     * @return false|PDOStatement.
     * @access public.
     */
    public static function getAll ()
    {
        $query_string = "SELECT * FROM `users`";

        return ServiceBus::get('database')->query($query_string)->fetchAll();
    }

}
