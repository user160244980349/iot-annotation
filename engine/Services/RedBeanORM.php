<?php

namespace Engine\Services;

use Engine\Decorators\Env;
use Error;
use RedBeanPHP\R;
use RedBeanPHP\Logger;


/**
 * RedBeanORM.php
 *
 * Class for database jobs via RedBeanORM.
 */
class RedBeanORM
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'database';

    /**
     * RedBeanORM service constructor.
     *
     * @access public
     */
    public function __construct()
    {
        R::setup("{ENV['db_driver']}:host={ENV['db_address']};dbname={ENV['db_name']}",
                   ENV['db_user'], ENV['db_password']);

        if (!R::testConnection()) {
            throw new Error('Database connection was not established', 500, null);
        }

        R::freeze(true);
    }

    /**
     * RedBeanORM service destructor.
     *
     * @access public
     */
    public function __destruct()
    {
        R::close();
    }

    /**
     * Gives a facade of RedBean.
     *
     * @access public
     * @return class
     */
    public function R()
    {
        return R::class;
    }

    /**
     * Gives logs.
     *
     * @access public
     * @return Logger
     */
    public function logs(): Logger
    {
        return R::getDatabaseAdapter()
            ->getDatabase()
            ->getLogger();
    }

}
