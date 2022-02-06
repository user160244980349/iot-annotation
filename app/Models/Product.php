<?php

namespace App\Models;

use Engine\Services\RawSQLService as SQL;
use PDO;

/**
 * Product.php
 *
 * Class that provides product model.
 */
class Product
{

    /**
     * Adds new products into database.
     *
     * @param array $rows - Set of products
     * @return bool
     */
    public static function create(array $rows): bool
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

        return null !== SQL::set($sql . implode(",", $instances), $values);
    }
}