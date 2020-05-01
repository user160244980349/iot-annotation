<?php

namespace Engine\Entity;

/**
 * MiddlewareQueue.php
 *
 * Class, that contains core middlewares important for application work.
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
     * Queue constructor.
     *
     * @access public.
     */
    public function __construct()
    {
        $middlewares = ServiceBus::get('conf')->get('middlewares');
        $this->_middlewares = [];
        foreach ($middlewares as $middleware) {
            array_push($this->_middlewares, new $middleware());
        }
    }

    /**
     * Iterate all middlewares as a chain.
     *
     * @return Request Modified container.
     * @access public.
     */
    public function run()
    {
        $result = null;
        foreach ($this->_middlewares as $_middleware) {
            $result = $_middleware->let($result);
        }

        return $result;
    }

}
