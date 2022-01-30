<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
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
        return SQL::query(

            "SELECT `groups`.`id`, `groups`.`name` FROM `users`
                INNER JOIN `group_user` ON `users`.`id` = `group_user`.`user_id`
                INNER JOIN `groups`     ON `group_user`.`group_id` = `groups`.`id`
             WHERE `users`.`id` = '$id'"

        )->fetchAll(PDO::FETCH_ASSOC);
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
        return SQL::query(

            "SELECT * FROM `groups` WHERE `id` = $id"

        )->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Gives array with all groups.
     *
     * @access public
     * @return array - All groups
     */
    public static function getAll(): array
    {
        return SQL::query(
            
            'SELECT * FROM `groups`'
            
        )->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Associates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param string $group - Group name
     * @return bool
     */
    public static function associateByName(int $id, string $group): void
    {
        SQL::query(

            "INSERT INTO `group_user` (
                `user_id`, 
                `group_id`
             ) VALUE 
                ($id, (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$group'))"
                
        );
    }

    /**
     * Associates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param int $group - Group id
     * @return bool.
     */
    public static function associateById(int $id, int $group_id): void
    {
        SQL::query(
        
            "INSERT INTO `group_user` (
                `user_id`, 
                `group_id`
             ) VALUE 
                ($id, $group_id)"
                
        );
    }

    /**
     * Disassociates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param string $group - Group name
     * @return bool.
     */
    public static function disassociateByName(int $id, string $group): void
    {
        SQL::query(

            "DELETE FROM `group_user`
             WHERE `user_id`  = $id AND
                   `group_id` = (SELECT `id` FROM `groups` WHERE `groups`.`name` = '$group')"
                   
        );
    }

    /**
     * Disassociates user with group.
     *
     * @access public
     * @param int $id - User id
     * @param int $group - Group id
     * @return bool.
     */
    public static function disassociateById(int $id, int $group_id): void
    {
        SQL::query(

            "DELETE FROM `group_user`
             WHERE `user_id`  = $id AND
                   `group_id` = $group_id"
                   
        );
    }

}