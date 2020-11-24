<?php

namespace Engine\Services;

use Engine\Decorators\Env;
use PDO;

/**
 * Database.php
 *
 * Class for database jobs.
 */
class Database
{
    /**
     * Application run method.
     *
     * @var public
     */
    static public $alias = "database";

    /**
     * Driver for database access.
     *
     * @access private.
     * @var string.
     */
    private $_driver;

    /**
     * Address for database access.
     *
     * @access private.
     * @var string.
     */
    private $_address;

    /**
     * Database name for access.
     *
     * @access private.
     * @var string.
     */
    private $_name;

    /**
     * Database for user access.
     *
     * @access private.
     * @var string.
     */
    private $_user;

    /**
     * Password for database access.
     *
     * @access private.
     * @var string.
     */
    private $_password;

    /**
     * Connection instance for database access.
     *
     * @access private.
     * @var string.
     */
    private $_connection;

    /**
     * Database constructor.
     *
     * @access public
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
     * Sends query to database and gives a response.
     *
     * @access public
     * @param string $queryString Query to send
     * @return array
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
     * Sends query to database and gives a response.
     *
     * @access public
     * @param string $queryString Query to send
     * @return array
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
     * Gives an error.
     *
     * @access public
     * @return array
     */
    public function error()
    {
        return $this->_connection->errorInfo();
    }

}
