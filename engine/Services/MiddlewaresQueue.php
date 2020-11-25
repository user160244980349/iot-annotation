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
    private static $_middlewares;

    /**
     * ServiceBus services registration.
     *
     * @access public
     * @return ServiceBus
     */
    public static function register(array $middleware_classes): void
    {
        static::$_middlewares = $middleware_classes;
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

        foreach (static::$_middlewares as $middleware) {
            $m = new $middleware();
            $result = $m->let($result);
        }

        return $result;
    }

}
