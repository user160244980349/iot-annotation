<?php

namespace App\Models;

use Engine\Services\RawSQLService as SQL;
use PDO;

/**
 * Data.php
 *
 * Class that provides password model.
 */
class Policy
{

    /**
     * Adds new policies into database.
     *
     * @param array $rows - Set of policies
     * @return ?
     */
    public static function create(array $rows)
    {
        $sql = <<<SQL

        INSERT INTO `policies` (
            `hash`,
            `content`
        ) VALUES

        SQL;

        $instances = [];
        $values = [];
        foreach ($rows as $hash => $content) {
            $instances[] = "\n(?, ?)";
            $values[]    = $hash;
            $values[]    = $content;
        }

        return SQL::set($sql . implode(",", $instances), $values);
    }

    /**
     * Gives policy for annotation.
     *
     * @return ?
     */
    public static function getOne()
    {
        $sql1 = <<<SQL

        SELECT * FROM `policies` 
        WHERE `content` <> '' AND
              `requested` = (SELECT MIN(`requested`) FROM `policies`)
        ORDER BY RAND() LIMIT 1

        SQL;

        $r = SQL::get($sql1, all: false);

        $sql2 = <<<SQL

        UPDATE `policies` 
        SET `requested` = `requested` + 1
        WHERE `id` = ?

        SQL;

        $s = SQL::set($sql2, [$r['id']]);
        if ($s) return $r; else return $s;
    }

}