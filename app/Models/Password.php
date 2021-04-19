<?php

namespace App\Models;

use Engine\Packages\RedBeanORM\Facade as R;

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
        $response = R::get()::exec(
            "INSERT INTO `passwords` (
                `id`,
                `value`
            ) VALUES (
                '{$id}',
                '{$password}'
            )");

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
        return R::get()::getCell(
            "SELECT `value` FROM `passwords` WHERE `id` = '$id'");
    }

}