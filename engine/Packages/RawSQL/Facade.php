<?php

namespace Engine\Packages\RawSQL;

use Engine\Packages\ServiceBus;
use PDOStatement;

/**
 * RawSQL.php
 *
 * Decorator for database tool.
 */
class Facade
{

    /**
     * Sends query to database and gives a response with all records.
     *
     * @access public
     * @param string $queryString - Query to send
     * @return array
     */
    public static function query(string $queryString): PDOStatement
    {
        return ServiceBus::instance()->get('database')->query($queryString);
    }

    /**
     * Gives response of the database.
     *
     * @access public
     * @return array
     */
    public static function error()
    {
        return ServiceBus::instance()->get('database')->error();
    }

}
