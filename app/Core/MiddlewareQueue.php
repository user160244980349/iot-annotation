<?php

namespace App\Core;

/**
 * MiddlewareQueue.php
 *
 * Class, that contains core services important for application work.
 */
class MiddlewareQueue
{
    /**
     * Middlewares providing different functions.
     *
     * @var array.
     * @access private.
     */
    private $_middlewares;

    /**
     * Iterate all middlewares as a chain.
     *
     * @return Request Modified container.
     * @access public.
     */
    public function run ()
    {
        $result = null;
        foreach ($this->_middlewares as $_middleware) {
            $result = $_middleware->let($result);
        }

        return $result;
    }

    /**
     * Queue constructor.
     *
     * @param array $queuedMiddlewares Sequenced middlewares.
     * @access public.
     */
    public function __construct (array $queuedMiddlewares)
    {
        $this->_middlewares = $queuedMiddlewares;
    }

}
