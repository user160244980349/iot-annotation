<?php

namespace App\Service;

use App\Object\ServiceBus;
use App\Object\MiddlewareQueue;

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
     * Application run method.
     *
     * @access public.
     */
    public function run () {

        $this->_queue = new MiddlewareQueue();
        $this->_queue->run();
        # dump($this->_queue->run());

    }

}
