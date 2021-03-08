<?php

namespace App\Models;

use Engine\Packages\RawSQL\Facade as RawSQL;
use PDO;

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
        $permissions = RawSQL::query(
            "SELECT * FROM `users`
             INNER JOIN `group_user`         ON `users`.`id` = `group_user`.`user_id`
             INNER JOIN `groups`             ON `group_user`.`group_id` = `groups`.`id`
             INNER JOIN `group_permission`   ON `groups`.`id` = `group_permission`.`group_id` 
             INNER JOIN `permissions`        ON `group_permission`.`permission_id` = `permissions`.`id` 
             WHERE `users`.`id` = '$id'")
            ->fetchAll(PDO::FETCH_ASSOC);

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
        return RawSQL::query(
            "SELECT * FROM `permissions`
             INNER JOIN `group_permission`   ON `permissions`.`id` = `group_permission`.`permission_id`
             INNER JOIN `groups`             ON `group_permission`.`group_id` = `groups`.`id` 
             WHERE `groups`.`id` = $id")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with all permissions.
     *
     * @access public
     * @return array
     */
    public static function getAll(): array
    {
        return RawSQL::query(
            'SELECT * FROM `permissions`')
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Associates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission - Permission value
     */
    public static function associateByName(int $id, string $permission): void
    {
        RawSQL::query(
            "INSERT INTO `group_permission` 
                (`group_id`, 
                 `permission_id`) VALUE 
                ($id, (SELECT `id` FROM `permission` WHERE `for` = '$permission'))")
            ->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Associates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission - Permission id
     */
    public static function associateById(int $id, int $permission_id): void
    {
        RawSQL::query(
            "INSERT INTO `group_permission` 
                (`group_id`, 
                 `permission_id`) VALUE 
                ($id, $permission_id)")
            ->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Disassociates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission - Permission id
     */
    public static function disassociateByName(int $id, string $permission): void
    {
        RawSQL::query(
            "DELETE FROM `group_permission`
             WHERE `group_id`  = $id AND
                   `permission_id` = (SELECT `id` FROM `permissions` WHERE `for` = '$permission')")
            ->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Disassociates group with permission.
     *
     * @access public
     * @param int $id - Group id
     * @param string $permission_id - Permission id
     */
    public static function disassociateById(int $id, int $permission_id): void
    {
        RawSQL::query(
            "DELETE FROM `group_permission`
             WHERE `group_id`  = $id AND
                   `permission_id` = $permission_id")
            ->fetch(PDO::FETCH_ASSOC);
    }

}