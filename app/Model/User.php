<?php

namespace App\Model;

use PDOStatement;
use Engine\Entity\ServiceBus;

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
     * @access public.
     * @param array $user.
     * @return false|PDOStatement.
     */
    public static function add(array $user)
    {
        $response = ServiceBus::get('database')->fetch(
            "INSERT INTO `users` (
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
     * @access public.
     * @param string $name.
     * @return false|PDOStatement.
     */
    public static function getByName(string $name)
    {
        return ServiceBus::get('database')->fetch(
            "SELECT * FROM `users` WHERE `name` = '$name';");
    }

    /**
     * Gives array with user info.
     *
     * @access public.
     * @param int $id.
     * @return false|PDOStatement.
     */
    public static function getById(int $id)
    {
        return ServiceBus::get('database')->fetch(
            "SELECT * FROM `users` WHERE `id` = '$id';");
    }

    /**
     * Gives array with all users info.
     *
     * @access public.
     * @return false|PDOStatement.
     */
    public static function getAll()
    {
        return ServiceBus::get('database')->fetchAll(
            "SELECT * FROM `users`;");
    }

    /**
     * Gives array with all user permissions.
     *
     * @access public.
     * @param int $id.
     * @return array.
     */
    public static function permissions(int $id) : array
    {
        return ServiceBus::get('database')->fetchAll(
            "SELECT `for` FROM `users`
                INNER JOIN `group_user`         ON `users`.`id` = `group_user`.`user_id`
                INNER JOIN `groups`             ON `group_user`.`group_id` = `groups`.`id`
                INNER JOIN `group_permission`   ON `groups`.`id` = `group_permission`.`group_id` 
                INNER JOIN `permissions`        ON `group_permission`.`id` = `permissions`.`id` 
                WHERE `users`.`id` = '$id'");
    }

}