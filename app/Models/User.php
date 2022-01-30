<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
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
        $response = SQL::query(

            "INSERT INTO `users` (
                `name`,
                `email`
             ) VALUE 
                ('{$user['name']}', '{$user['email']}')"

        );

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
        return SQL::query(

            "SELECT * FROM `users` WHERE `name` = '$name'"

        )->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param string $name - User`s name
     * @return null|array.
     */
    public static function getByEmail(string $email)
    {
        return SQL::query(

            "SELECT * FROM `users` WHERE `email` = '$email'"

        )->fetch(PDO::FETCH_ASSOC);
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
        return SQL::query(

            "SELECT * FROM `users` WHERE `id` = '$id'"

        )->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with all users info.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        return SQL::query(

            "SELECT * FROM `users`"

        )->fetchAll(PDO::FETCH_ASSOC);
    }

}