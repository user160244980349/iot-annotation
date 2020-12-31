<?php

namespace App\Models;

use Engine\Packages\RawSQL\Facade as RawSQL;

/**
 * Permission.php
 *
 * Class that provides permission model.
 */
class Permission
{

    /**
     * Gives all user permissions.
     *
     * @access public
     * @param int $id - User id
     * @return array - Permissions values
     */
    public static function getForUser(int $id): array
    {
        $permissions = RawSQL::fetchAll(
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
     * Gives all group permissions.
     *
     * @access public
     * @param int $id - Group id
     * @return array - Permissions values
     */
    public static function getForGroup(int $id): array
    {
        return RawSQL::fetchAll(
            "SELECT * FROM `permissions`
             INNER JOIN `group_permission`   ON `permissions`.`id` = `group_permission`.`permission_id`
             INNER JOIN `groups`             ON `group_permission`.`group_id` = `groups`.`id` 
             WHERE `groups`.`id` = $id"
        );
    }

    /**
     * Gives array with all permissions.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        return RawSQL::fetchAll(
            'SELECT * FROM `permissions`');
    }

    /**
     * Associates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission - Permission value
     * @return bool.
     */
    public static function associateByName(int $id, string $permission): bool
    {
        RawSQL::fetch(
            "INSERT INTO `group_permission` 
                (`group_id`, 
                 `permission_id`) VALUE 
                ($id, (SELECT `id` FROM `permission` WHERE `for` = '$permission'))");
        return true;
    }

    /**
     * Associates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission - Permission id
     * @return bool.
     */
    public static function associateById(int $id, int $permission_id): bool
    {
        RawSQL::fetch(
            "INSERT INTO `group_permission` 
                (`group_id`, 
                 `permission_id`) VALUE 
                ($id, $permission_id)");
        return true;
    }

    /**
     * Disassociates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission - Permission id
     * @return bool.
     */
    public static function disassociateByName(int $id, string $permission): bool
    {
        RawSQL::fetch(
            "DELETE FROM `group_permission`
             WHERE `group_id`  = $id AND
                   `permission_id` = (SELECT `id` FROM `permissions` WHERE `for` = '$permission')");
        return true;
    }

    /**
     * Disassociates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission_id - Permission id
     * @return bool.
     */
    public static function disassociateById(int $id, int $permission_id): bool
    {
        RawSQL::fetch(
            "DELETE FROM `group_permission`
             WHERE `group_id`  = $id AND
                   `permission_id` = $permission_id");
        return true;
    }

}