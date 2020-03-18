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

        $this->_queue = new MiddlewareQueue();
        $this->_queue->run();
        # dump($this->_queue->run());

    }

}
