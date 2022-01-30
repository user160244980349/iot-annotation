<?php

namespace App\Models;

use Engine\RawSQL\Facade as SQL;
use PDO;

/**
 * Data.php
 *
 * Class that provides password model.
 */
class Data
{

    /**
     * Adds new password into database.
     *
     * @access public
     * @param int $id - User id
     * @param string $password - Password string
     * @return bool
     */
    public static function create(string $base, array $json)
    {
        $q = 
        "INSERT INTO `texts` (
            `url`,
            `manufacturer`,
            `keyword`,
            `website`,
            `policy`,
            `policy_hash`,
            `content`
         ) VALUES ";

        $portion = 100;
        $rows = [];
        foreach ($json as $row => $value) {
            $portion--;
            $content = null;
            $file = $base  . '/' . $value['plain_policy'];

            if (is_file($file)) {
                $content = file_get_contents($file);
            }
                
            array_push($rows,
                "('{$value['url']}', 
                  '{$value['manufacturer']}', 
                  '{$value['keyword']}', 
                  '{$value['website']}', 
                  '{$value['policy']}', 
                  '{$value['policy_hash']}', 
                  '{$content}')"
            );

            if ($portion < 1) {
                    
                $d = implode(",", $rows);
                SQL::query($q . $d);

                $rows = [];
            }
        }
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

            "SELECT * FROM `texts` WHERE `content` <> '' ORDER BY RAND() LIMIT 1;"

        )->fetch(PDO::FETCH_ASSOC);
    }

}