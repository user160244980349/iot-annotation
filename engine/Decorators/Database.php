<?php

namespace Engine\Decorators;

use Engine\ServiceBus;
use PDO;

/**
 * Database.php
 *
 * Class for database jobs.
 */
class Database
{

    /**
     * Send query to database and give a response.
     *
     * @param string $queryString Query to send.
     * @return array
     * @access public.
     */
    public static function fetch(string $queryString)
    {
        return ServiceBus::instance()->get('database')->fetch($queryString);
    }

    /**
     * Send query to database and give a response.
     *
     * @param string $queryString Query to send.
     * @return array
     * @access public.
     */
    public static function fetchAll(string $queryString)
    {
        return ServiceBus::instance()->get('database')->fetchAll($queryString);
    }

    /**
     * Send query to database and give a response.
     *
     * @return array
     * @access public.
     */
    public static function error()
    {
        return ServiceBus::instance()->get('database')->error();
    }

}
