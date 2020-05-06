<?php

namespace App\Models;

use Engine\Decorators\Database;

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
     * @param array $user
     * @return bool
     */
    public static function add(array $user): bool
    {
        $response = Database::fetch("
            INSERT INTO `users` (
                `name`,
                `password`,
                `email`
            ) VALUES (
                '{$user['name']}',
                '{$user['password']}',
                '{$user['email']}'
            );");

        return isset($response);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param string $name
     * @return array
     */
    public static function getByName(string $name): array
    {
        return Database::fetch("
            SELECT * FROM `users` WHERE `name` = '$name';");
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param int $id
     * @return null|array
     */
    public static function getById(int $id)
    {
        return Database::fetch("
            SELECT * FROM `users` WHERE `id` = '$id';");
    }

    /**
     * Gives array with all users info.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        return Database::fetchAll("
            SELECT * FROM `users`;");
    }

}