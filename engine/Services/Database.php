<?php

namespace Engine\Services;

use PDO;
use Engine\Decorators\Env;

/**
 * Database.php
 *
 * Class for database jobs.
 */
class Database
{

    /**
     * Driver for database access.
     *
     * @var string.
     * @access private.
     */
    private $_driver;

    /**
     * Address for database access.
     *
     * @var string.
     * @access private.
     */
    private $_address;

    /**
     * Database name for access.
     *
     * @var string.
     * @access private.
     */
    private $_name;

    /**
     * Database for user access.
     *
     * @var string.
     * @access private.
     */
    private $_user;

    /**
     * Password for database access.
     *
     * @var string.
     * @access private.
     */
    private $_password;

    /**
     * Connection instance for database access.
     *
     * @var string.
     * @access private.
     */
    private $_connection;

    /**
     * Database constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        $env = Env::get('database');

        $this->_driver = $env['driver'];
        $this->_address = $env['address'];
        $this->_name = $env['name'];
        $this->_user = $env['user'];
        $this->_password = $env['password'];

        $this->_connection = new PDO(
            $this->_driver . ':host=' .
            $this->_address . ';dbname=' .
            $this->_name = $env['name'],
            $this->_user = $env['user'],
            $this->_password
        );
    }

    /**
     * Send query to database and give a response.
     *
     * @param string $queryString Query to send.
     * @return array
     * @access public.
     */
    public function fetch($queryString)
    {
        $pdo = $this->_connection->query($queryString);
        if (isset($pdo) && $pdo != false) {
            return $pdo->fetch(PDO::FETCH_ASSOC);
        }
        return null;
    }

    /**
     * Send query to database and give a response.
     *
     * @param string $queryString Query to send.
     * @return array
     * @access public.
     */
    public function fetchAll($queryString)
    {
        $pdo = $this->_connection->query($queryString);
        if (isset($pdo) && $pdo != false) {
            return $pdo->fetchAll(PDO::FETCH_ASSOC);
        }
        return null;
    }

    /**
     * Send query to database and give a response.
     *
     * @return array
     * @access public.
     */
    public function error()
    {
        return $this->_connection->errorInfo();
    }

}
