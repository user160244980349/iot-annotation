<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
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
        $q = 
        "INSERT INTO `selections` (
            `starts_on`,
            `ends_on`,
            `selection_class`,
            `user_id`,
            `policy_hash`
         ) VALUES ";

        $instances = [];
        foreach ($rows as $content) {
            $instances[] =
                "('{$content['starts_on']}', 
                  '{$content['ends_on']}', 
                  '{$content['selection_class']}', 
                  '{$content['user_id']}', 
                  '{$content['policy_hash']}')";
        }
        $d = implode(",", $instances);

        SQL::query($q . $d);
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
        return SQL::query(

            "SELECT * FROM `selections`
                INNER JOIN `users` ON `user_id` = `users`.`id`"

        )->fetchAll(PDO::FETCH_ASSOC);
    }

}