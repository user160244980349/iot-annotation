<?php

namespace App\Models;

use Engine\Packages\RawSQL\Facade as RawSQL;
use PDO;

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
     * @param array $user - Array of values
     * @return bool
     */
    public static function create(array $user): bool
    {
        $response = RawSQL::query(
            "INSERT INTO `users` (
                `name`,
                `email`
            ) VALUES (
                '{$user['name']}',
                '{$user['email']}'
            )")
            ->fetch(PDO::FETCH_ASSOC);

        return isset($response);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param string $name - User`s name
     * @return null|array.
     */
    public static function getByName(string $name)
    {
        return RawSQL::query(
            "SELECT * FROM `users` WHERE `name` = '$name'")
            ->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param int $id - User id
     * @return null|array
     */
    public static function getById(int $id)
    {
        return RawSQL::query(
            "SELECT * FROM `users` WHERE `id` = '$id'")
            ->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with all users info.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        return RawSQL::query(
            "SELECT * FROM `users`")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

}