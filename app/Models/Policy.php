<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
use PDO;

/**
 * Data.php
 *
 * Class that provides password model.
 */
class Policy
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
        "INSERT INTO `policies` (
            `hash`,
            `content`
         ) VALUES ";

        $instances = [];
        foreach ($rows as $hash => $content) {
            $instances[] =
                "('$hash', 
                  '$content')";
        }
        $d = implode(",", $instances);
        SQL::query($q . $d);
    }

    /**
     * Gives encrypted password.
     *
     * @access public
     * @return null|array
     */
    public static function getOne()
    {
        return SQL::query(

            "SELECT * FROM `policies` WHERE `content` <> '' ORDER BY RAND() LIMIT 1;"

        )->fetch(PDO::FETCH_ASSOC);
    }

}