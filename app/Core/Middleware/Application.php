<?php

namespace App\Core;

use App\Core\Middleware\Receiver;
use App\Core\Middleware\Router;
use App\Core\Middleware\Auth;
use App\Core\Middleware\ControllerExecution;
use App\Core\Middleware\MiddlewareInterface;

/**
 * Application.php
 *
 * Main class for application.
 */
class Application
{
    /**
     * Queue for middlewares.
     *
     * @var MiddlewareQueue.
     * @access private.
     */
    private $_queue;

    /**
     * Application constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        $this->_queue = new MiddlewareQueue([
            new Receiver(),
            new Router(),
            new Auth(),
            new ControllerExecution(),
        ]);

        $request = $this->_queue->run();

        # test
        dump($request);
    }

}
