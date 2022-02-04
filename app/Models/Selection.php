<?php

namespace App\Models;

use Engine\Services\RawSQLService as SQL;
use PDO;

/**
 * Data.php
 *
 * Class that provides password model.
 */
class Selection
{

    /**
     * Adds new password into database.
     *
     * @access public
     * @param int $id - User id
     * @param string $password - Password string
     * @return bool
     */
    public static function create(array $rows)
    {
        $sql = <<<SQL

        INSERT INTO `selections` (
            `starts_on`,
            `ends_on`,
            `selection_class`,
            `user_id`,
            `policy_hash`
        ) VALUES

        SQL;

        $instances = [];
        foreach ($rows as $content) {
            $instances[] = "\n(?, ?, ?, ?, ?)";
            $values[]    = $content['starts_on'];
            $values[]    = $content['ends_on'];
            $values[]    = $content['selection_class'];
            $values[]    = $content['user_id'];
            $values[]    = $content['policy_hash'];
        }

        return SQL::set($sql . implode(",", $instances), $values);
    }

    /**
     * Adds new password into database.
     *
     * @access public
     * @param int $id - User id
     * @param string $password - Password string
     * @return bool
     */
    public static function packWithUsers()
    {
        $sql = <<<SQL
        
        SELECT * FROM `selections`
            INNER JOIN `users` ON `user_id` = `users`.`id`
        
        SQL;

        return SQL::get($sql);
    }

}