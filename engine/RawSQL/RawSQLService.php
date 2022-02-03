<?php

namespace Engine\RawSQL;

use Engine\Config;
use PDOStatement;
use PDO;

/**
 * RawSQL.php
 *
 * Class for database jobs.
 */
class RawSQLService
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'database';

    /**
     * Driver for database access.
     *
     * @access private
     * @var string
     */
    private string $_driver;

    /**
     * Address for database access.
     *
     * @access private
     * @var string
     */
    private string $_address;

    /**
     * Database name for access.
     *
     * @access private
     * @var string
     */
    private string $_name;

    /**
     * Database for user access.
     *
     * @access private
     * @var string
     */
    private string $_user;

    /**
     * Password for database access.
     *
     * @access private
     * @var string
     */
    private string $_password;

    /**
     * Connection instance for database access.
     *
     * @access private
     * @var string
     */
    private PDO $_connection;

    /**
     * Database constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $env = Config::get('env');
        $this->_driver = $env['db_driver'];
        $this->_address = $env['db_address'];
        $this->_name = $env['db_name'];
        $this->_user = $env['db_user'];
        $this->_password = $env['db_password'];

        $this->_connection = new PDO(
            "$this->_driver:host=$this->_address;dbname=$this->_name",
            $this->_user,
            $this->_password
        );
    }

    /**
     * Sends query to database and gives a response.
     *
     * @access public
     * @param string $queryString - Query to send
     * @return array
     */
    public function query($queryString): ?PDOStatement
    {
        $pdo = $this->_connection->query($queryString);
        if (isset($pdo) && $pdo != false) {
            return $pdo;
        }
        return null;
    }

    /**
     * Sends query to database and gives a response.
     *
     * @access public
     * @param string $queryString - Query to send
     * @return array
     */
    public function prepare($queryString): ?PDOStatement
    {
        $pdo = $this->_connection->prepare($queryString);
        if (isset($pdo) && $pdo != false) {
            return $pdo;
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
