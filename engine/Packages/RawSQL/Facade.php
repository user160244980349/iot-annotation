<?php

namespace Engine\Packages\RawSQL;

use Engine\Packages\ServiceBus;

/**
 * RawSQL.php
 *
 * Decorator for database tool.
 */
class Facade
{

    /**
     * Sends query to database and gives a response with 1 record.
     *
     * @access public
     * @param string $queryString - Query to send
     * @return null|array
     */
    public static function fetch(string $queryString)
    {
        return ServiceBus::instance()->get('database')->fetch($queryString);
    }

    /**
     * Sends query to database and gives a response with all records.
     *
     * @access public
     * @param string $queryString - Query to send
     * @return array
     */
    public static function fetchAll(string $queryString)
    {
        return ServiceBus::instance()->get('database')->fetchAll($queryString);
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
