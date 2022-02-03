<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
use PDO;

/**
 * Password.php
 *
 * Class that provides password model.
 */
class Password
{

    /**
     * Adds new password into database.
     *
     * @access public
     * @param int $id - User id
     * @param string $password - Password string
     * @return bool
     */
    public static function create(int $id, string $password): bool
    {
        $sql = <<<SQL

        INSERT INTO `passwords` (
            `id`,
            `value`
        ) VALUE 
            (?, ?)
            
        SQL;

        $q = SQL::prepare($sql);
        $r = $q->execute([$id, $password]);
        return isset($r);
    }

    /**
     * Gives encrypted password.
     *
     * @access public
     * @param int $id - User id
     * @return null|array
     */
    public static function getValue(int $id)
    {
        $sql = <<<SQL

        SELECT `value` FROM `passwords` WHERE `id` = ?

        SQL;

        $q = SQL::prepare($sql);
        $q->execute([$id]);
        return $q->fetch(PDO::FETCH_ASSOC);
    }

}