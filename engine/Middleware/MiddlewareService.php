<?php

namespace Engine\Middleware;

use Engine\Receive\Request;
use Engine\Config;

/**
 * MiddlewaresQueue.php
 *
 * Class that contains core middlewares important for application.
 */
class MiddlewareService
{
    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'middlewares_queue';

    /**
     * Middlewares providing different functions.
     *
     * @access private
     * @var array
     */
    private array $_middlewares;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public function __construct()
    {
        $this->_middlewares = Config::get('middlewares');
    }

    /**
     * Iterate all middlewares as a chain.
     *
     * @access public
     * @return Request
     */
    public function run(): Request
    {
        $result = null;

        foreach ($this->_middlewares as $middleware) {
            $m = new $middleware();
            $result = $m->let($result);
        }

        return $result;
    }

}
