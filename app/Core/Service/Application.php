<?php

namespace App\Core\Service;

use App\Core\ServiceBus;
use App\Core\MiddlewareQueue;
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
    public function run () {

        $middleware_names = ServiceBus::instance()->get('conf')->get('middlewares');
        $middleware_objects = [];
        foreach ($middleware_names as $middleware) {
            array_push($middleware_objects, new $middleware());
        }
        $this->_queue = new MiddlewareQueue($middleware_objects);

        $request = $this->_queue->run();

        # test
        dump($request);
    }

}
