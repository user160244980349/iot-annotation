<?php

namespace App\Models;

use Engine\Decorators\Database;

/**
 * Password.php
 *
 * Class that provides password model.
 */
class Group
{

    /**
     * Gives array with all users info.
     *
     * @access public
     * @return array
     */
    public static function getForId(int $id): array
    {
        return Database::fetchAll(
            "SELECT `groups`.`id`, `groups`.`name` FROM `users`
             INNER JOIN `group_user` ON `users`.`id` = `group_user`.`user_id`
             INNER JOIN `groups`     ON `group_user`.`group_id` = `groups`.`id`
             WHERE `users`.`id` = '$id'");
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param int $id
     * @return array
     */
    public static function getById(int $id): array
    {
        return Database::fetch(
            "SELECT * FROM `groups` WHERE `id` = $id");
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param int $id
     * @return array
     */
    public static function getAll(): array
    {
        return Database::fetchAll(
            "SELECT * FROM `groups`");
    }

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @param string $group
     * @return bool.
     */
    public static function associateByName(int $id, string $group): bool
    {
        Database::fetch(
            "INSERT INTO `group_user` 
                (`user_id`, 
                 `group_id`) VALUE 
                ($id, (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$group'))");
        return true;
    }

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @param string $group
     * @return bool.
     */
    public static function associateById(int $id, int $group_id): bool
    {
        Database::fetch(
            "INSERT INTO `group_user` 
                (`user_id`, 
                 `group_id`) VALUE 
                ($id, $group_id)");
        return true;
    }

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @param string $group
     * @return bool.
     */
    public static function disassociateByName(int $id, string $group): bool
    {
        Database::fetch(
            "DELETE FROM `group_user`
             WHERE `user_id`  = $id AND
                   `group_id` = (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$group')");
        return true;
    }

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @param string $group
     * @return bool.
     */
    public static function disassociateById(int $id, int $group_id): bool
    {
        Database::fetch(
            "DELETE FROM `group_user`
             WHERE `user_id`  = $id AND
                   `group_id` = $group_id");
        return true;
    }

}