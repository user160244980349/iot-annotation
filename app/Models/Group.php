<?php

namespace App\Models;

use Engine\Services\RawSQLService as SQL;
use PDO;

/**
 * Group.php
 *
 * Class that provides group model.
 */
class Group
{

    /**
     * Gives array with user groups.
     *
     * @access public
     * @param int $id - User id
     * @return array - Groups for user
     */
    public static function getForId(int $id): array
    {
        $sql = <<<SQL

        SELECT `groups`.`id`, `groups`.`name` FROM `users`
            INNER JOIN `group_user` ON `users`.`id` = `group_user`.`user_id`
            INNER JOIN `groups`     ON `group_user`.`group_id` = `groups`.`id`
        WHERE `users`.`id` = ?

        SQL;

        return SQL::get($sql, [$id]);
    }

    /**
     * Gives array with group info.
     *
     * @access public
     * @param int $id - User id
     * @return array - Group
     */
    public static function getById(int $id): array
    {
        $sql = <<<SQL

        SELECT * FROM `groups` WHERE `id` = ?

        SQL;

        return SQL::get($sql, [$id], all: false);
    }

    /**
     * Gives array with all groups.
     *
     * @access public
     * @return array - All groups
     */
    public static function getAll(): array
    {
        $sql = <<<SQL

        SELECT * FROM `groups`

        SQL;

        return SQL::get($sql);
    }

    /**
     * Associates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param string $group - Group name
     * @return bool
     */
    public static function associateByName(int $id, string $group)
    {
        $sql = <<<SQL

        INSERT INTO `group_user` (
            `user_id`, 
            `group_id`
        ) VALUE
            (?, (SELECT `id` FROM `groups` WHERE `groups`.`name` = ?))

        SQL;

        return SQL::set($sql, [$id, $group]);
    }

    /**
     * Associates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param int $group - Group id
     * @return bool.
     */
    public static function associateById(int $id, int $group_id)
    {
        $sql = <<<SQL

        INSERT INTO `group_user` (
            `user_id`, 
            `group_id`
        ) VALUE 
            (?, ?)

        SQL;

        return SQL::set($sql, [$id, $group_id]);
    }

    /**
     * Disassociates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param string $group - Group name
     * @return bool.
     */
    public static function disassociateByName(int $id, string $group)
    {
        $sql = <<<SQL
        
        DELETE FROM `group_user`
        WHERE `user_id`  = ? AND
              `group_id` = (SELECT `id` FROM `groups` WHERE `groups`.`name` = ?)

        SQL;

        return SQL::set($sql, [$id, $group]);
    }

    /**
     * Disassociates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param int $group - Group id
     * @return bool.
     */
    public static function disassociateById(int $id, int $group_id)
    {
        $sql = <<<SQL

        DELETE FROM `group_user`
        WHERE `user_id`  = ? AND
              `group_id` = ?

        SQL;

        return SQL::set($sql, [$id, $group_id]);
    }

}