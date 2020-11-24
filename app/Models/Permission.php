<?php

namespace App\Models;

use Engine\Decorators\Database;

/**
 * Password.php
 *
 * Class that provides password model.
 */
class Permission
{

    /**
     * Adds new password into database.
     *
     * @access public
     * @param int $id
     * @param string $password
     * @return bool
     */
    public static function getForUser(int $id): array
    {
        $permissions = Database::fetchAll(
            "SELECT `for` FROM `users`
             INNER JOIN `group_user`         ON `users`.`id` = `group_user`.`user_id`
             INNER JOIN `groups`             ON `group_user`.`group_id` = `groups`.`id`
             INNER JOIN `group_permission`   ON `groups`.`id` = `group_permission`.`group_id` 
             INNER JOIN `permissions`        ON `group_permission`.`id` = `permissions`.`id` 
             WHERE `users`.`id` = '$id'"
        );
        return array_column($permissions, "for");
    }

    /**
     * Adds new password into database.
     *
     * @access public
     * @param int $id
     * @param string $password
     * @return bool
     */
    public static function getForGroup(int $id): array
    {
        return Database::fetchAll(
            "SELECT * FROM `permissions`
             INNER JOIN `group_permission`   ON `permissions`.`id` = `group_permission`.`permission_id`
             INNER JOIN `groups`             ON `group_permission`.`group_id` = `groups`.`id` 
             WHERE `groups`.`id` = $id"
        );
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
            "SELECT * FROM `permissions`");
    }

    /**
     * Log user out.
     *
     * @access public
     * @param int $id
     * @param string $group
     * @return bool.
     */
    public static function associateByName(int $id, string $permission): bool
    {
        Database::fetch(
            "INSERT INTO `group_permission` 
                (`group_id`, 
                 `permission_id`) VALUE 
                ($id, (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$permission'))");
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
    public static function associateById(int $id, int $permission_id): bool
    {
        Database::fetch(
            "INSERT INTO `group_permission` 
                (`group_id`, 
                 `permission_id`) VALUE 
                ($id, $permission_id)");
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
    public static function disassociateByName(int $id, string $permission): bool
    {
        Database::fetch(
            "DELETE FROM `group_permission`
             WHERE `group_id`  = $id AND
                   `permission_id` = (SELECT `id` FROM `permissions` WHERE `permissions`.`name` = '$permission')");
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
    public static function disassociateById(int $id, int $permission_id): bool
    {
        Database::fetch(
            "DELETE FROM `group_permission`
             WHERE `group_id`  = $id AND
                   `permission_id` = $permission_id");
        return true;
    }

}