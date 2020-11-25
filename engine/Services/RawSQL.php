<?php

namespace Engine\Services;

use Engine\Env;
use PDO;


/**
 * RawSQL.php
 *
 * Class for database jobs.
 */
class RawSQL
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'database';

    /**
     * Driver for database access.
     *
     * @access private
     * @var string
     */
    private $_driver;

    /**
     * Address for database access.
     *
     * @access private
     * @var string
     */
    private $_address;

    /**
     * Database name for access.
     *
     * @access private
     * @var string
     */
    private $_name;

    /**
     * Database for user access.
     *
     * @access private
     * @var string
     */
    private $_user;

    /**
     * Password for database access.
     *
     * @access private
     * @var string
     */
    private $_password;

    /**
     * Connection instance for database access.
     *
     * @access private
     * @var string
     */
    private $_connection;

    /**
     * Database constructor.
     *
     * @access public
     */
    public function __construct()
    {
        
        $this->_driver = ENV['db_driver'];
        $this->_address = ENV['db_address'];
        $this->_name = ENV['db_name'];
        $this->_user = ENV['db_user'];
        $this->_password = ENV['db_password'];

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
