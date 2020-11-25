<?php

namespace Engine\Services;

use Engine\Request;

/**
 * MiddlewaresQueue.php
 *
 * Class that contains core middlewares important for application.
 */
class MiddlewaresQueue
{
    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'middlewares_queue';

    /**
     * Middlewares providing different functions.
     *
     * @access private
     * @var array
     */
    private $_middlewares;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public function __construct()
    {
        $this->_middlewares = require_once ENV['middlewares'];
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
