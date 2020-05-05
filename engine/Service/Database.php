<?php

namespace Engine\Service;

use Engine\Entity\ServiceBus;
use PDO;

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
        $conf = ServiceBus::get('conf')->get('database');

        $this->_driver = $conf['driver'];
        $this->_address = $conf['address'];
        $this->_name = $conf['name'];
        $this->_user = $conf['user'];
        $this->_password = $conf['password'];

        $this->_connection = new PDO(
            $this->_driver . ':host=' . $this->_address . ';dbname=' . $this->_name = $conf['name'],
            $this->_user = $conf['user'],
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
