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
        $response = SQL::query(

            "INSERT INTO `passwords` (
                `id`,
                `value`
             ) VALUE 
                ('{$id}', '{$password}')"
            
        );

        return isset($response);
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
        return SQL::query(

            "SELECT `value` FROM `passwords` WHERE `id` = '$id'"

        )->fetch(PDO::FETCH_ASSOC);
    }

}