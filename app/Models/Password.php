<?php

namespace App\Models;

use Engine\Decorators\Database;

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
     * @param int $id
     * @param string $password
     * @return bool
     */
    public static function create(int $id, string $password): bool
    {
        $response = Database::fetch(
            "INSERT INTO `passwords` (
                `id`,
                `value`
            ) VALUES (
                '{$id}',
                '{$password}'
            );");

        return isset($response);
    }

    /**
     * Gives array with user info.
     *
     * @access public
     * @param int $id
     * @return null|array
     */
    public static function getValue(int $id)
    {
        return Database::fetch(
            "SELECT * FROM `passwords` WHERE `id` = '$id';")['value'];
    }

}