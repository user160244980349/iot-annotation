<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
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
        $q = 
        "INSERT INTO `products` (
            `manufacturer`,
            `keyword`,
            `product_url`,
            `website_url`,
            `policy_url`,
            `policy_hash`
         ) VALUES ";

        $instances = [];
        foreach ($rows as $row => $value) {
            $instances[] =
                "('{$value['manufacturer']}', 
                  '{$value['keyword']}', 
                  '{$value['product_url']}',
                  '{$value['website_url']}', 
                  '{$value['policy_url']}', 
                  '{$value['policy_hash']})";
        }
        $d = implode(",", $instances);
        SQL::query($q . $d);
    }
}