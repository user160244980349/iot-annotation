<?php

namespace Engine;

use Engine\Decorators\Configuration;
use Error;

/**
 * MiddlewaresQueue.php
 *
 * Class, that contains core mediators important for application work.
 */
class MiddlewaresQueue
{
    /**
     * Middlewares providing different functions.
     *
     * @access private
     * @var array
     */
    private $_middlewares;

    /**
     * Queue constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $middlewares = Configuration::get('middlewares');
        $this->_middlewares = [];
        foreach ($middlewares as $middleware) {
            array_push($this->_middlewares, new $middleware());
        }
    }

    /**
     * Iterate all middlewares as a chain.
     *
     * @access public
     * @return Request Modified container
     */
    public function run(): Request
    {
        $result = null;

        try {

            foreach ($this->_middlewares as $_middleware) {
                $result = $_middleware->let($result);
            }

        } catch (Error $exception) {
            $fallbackMiddlewares = Configuration::get('middlewares_fallback');
            $this->_middlewares = [];
            foreach ($fallbackMiddlewares as $middleware) {
                array_push($this->_middlewares, new $middleware());
            }

            $result->route = new Route ('error', ['Engine\Controllers\ExceptionHandler', 'handle'], [$exception]);
            foreach ($this->_middlewares as $_middleware) {
                $result = $_middleware->let($result);
            }
        }

        return $result;
    }

}
