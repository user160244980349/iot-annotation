<?php

namespace Engine\Services;

use Engine\Config;
use Engine\Service;
use PDOStatement;
use PDO;

/**
 * RawSQL.php
 *
 * Class for database jobs.
 */
class RawSQLService extends Service
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
    protected function connection(): ?PDO
    {
        $pdo = $this->_connection;
        if (isset($pdo)) {
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
    protected function set(string $queryString, array $params = null): ?PDOStatement
    {
        if (!isset($this->_connection) || !$this->_connection) {
            return null;
        }

        $q = null;
        if (isset($params)) {
            $q = $this->_connection->prepare($queryString);
            if (!isset($q) || !$q) return null;
            if (!$q->execute($params)) return null;
        } else {
            $q = $this->_connection->query($queryString);
            if (!isset($q) || !$q) return null;
        }

        return $q;
    }

    /**
     * Sends query to database and gives a response.
     *
     * @access public
     * @param string $queryString - Query to send
     * @return array
     */
    protected function get(string $queryString, array $params = null, int $options = PDO::FETCH_ASSOC, bool $all = true): ?array
    {
        $q = static::set($queryString, $params);
        if (!isset($q)) return null;

        $r = null;
        if ($all)
            $r = $q->fetchAll($options);
        else
            $r = $q->fetch($options);

        return $r !== false ? $r : null;
    }

    /**
     * Gives an error.
     *
     * @access public
     * @return array
     */
    protected function error()
    {
        return $this->_connection->errorInfo();
    }

}
