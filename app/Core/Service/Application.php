<?php

namespace App\Core\Service;

use App\Core\ServiceBus;
use App\Core\MiddlewareQueue;

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

        $middleware_names = ServiceBus::get('conf')->get('middlewares');
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
