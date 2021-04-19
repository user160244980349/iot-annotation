<?php

namespace App\Models;

use Engine\Packages\RedBeanORM\Facade as R;

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
        $response = R::get()::exec(
            "INSERT INTO `users` (
                `name`,
                `email`
            ) VALUES (
                '{$user['name']}',
                '{$user['email']}'
            )");

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
        return R::get()::getRow(
            "SELECT * FROM `users` WHERE `name` = '$name'");
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
        return R::get()::getRow(
            "SELECT * FROM `users` WHERE `email` = '$email'");
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
        return R::get()::getRow(
            "SELECT * FROM `users` WHERE `id` = '$id'");
    }

    /**
     * Gives array with all users info.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        return R::get()::getAll(
            "SELECT * FROM `users`");
    }

}