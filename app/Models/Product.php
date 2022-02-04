<?php

namespace App\Models;

use Engine\Services\RawSQLService as SQL;
use PDO;

/**
 * Data.php
 *
 * Class that provides password model.
 */
class Product
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

        INSERT INTO `products` (
            `manufacturer`,
            `keyword`,
            `product_url`,
            `website_url`,
            `policy_url`,
            `policy_hash`
        ) VALUES 

        SQL;

        $instances = [];
        $values = [];
        foreach ($rows as $row) {
            $instances[] = "\n(?, ?, ?, ?, ?, ?)";
            $values[]    = $row['manufacturer'];
            $values[]    = $row['keyword'];
            $values[]    = $row['product_url'];
            $values[]    = $row['website_url'];
            $values[]    = $row['policy_url'];
            $values[]    = $row['policy_hash'];
        }

        SQL::set($sql . implode(",", $instances), $values);
    }
}