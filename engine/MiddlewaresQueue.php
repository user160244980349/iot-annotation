<?php

namespace Engine;

/**
 * MiddlewaresQueue.php
 *
 * Class that contains core middlewares important for application.
 */
class MiddlewaresQueue
{
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
            $result = $middleware::let($result);
        }

        return $result;
    }

}
