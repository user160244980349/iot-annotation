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
        $env = Env::get('database');

        R::setup("{$env['driver']}:host={$env['address']};dbname={$env['name']}",
                   $env['user'], $env['password']);

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
