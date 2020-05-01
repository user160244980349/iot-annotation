<?php

namespace App\Model;

use Engine\Entity\ServiceBus;
use PDOStatement;

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
     * @access public
     * @param array $user .
     * @return false|PDOStatement.
     */
    public static function add(array $user)
    {

        $query_string =
<<<EOQ
INSERT INTO `users` (
    `name`,
    `password`,
    `email`
) VALUES (
    '{$user['name']}',
    '{$user['password']}',
    '{$user['email']}'
);
EOQ;

        return ServiceBus::get('database')->query($query_string);
    }

    /**
     * Gets array with info.
     *
     * @access public.
     * @param string $name
     * @return false|PDOStatement.
     */
    public static function getByName(string $name)
    {
        $query_string =
<<<EOQ
SELECT * FROM `users` WHERE `name` = '$name';
EOQ;

        return ServiceBus::get('database')->query($query_string)->fetch();
    }

    /**
     * Gets array with info.
     *
     * @access public.
     * @param int $id .
     * @return false|PDOStatement.
     */
    public static function getById(int $id)
    {
        $query_string =
<<<EOQ
SELECT * FROM `users` WHERE `id` = '$id';
EOQ;

        return ServiceBus::get('database')->query($query_string)->fetch();
    }

    /**
     * Gets array with info.
     *
     * @access public.
     * @return false|PDOStatement.
     */
    public static function getAll()
    {
        $query_string =
<<<EOQ
SELECT * FROM `users`;
EOQ;

        return ServiceBus::get('database')->query($query_string)->fetchAll();
    }

}
