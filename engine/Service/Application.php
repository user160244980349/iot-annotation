<?php

namespace Engine\Service;

use Engine\Entity\MiddlewareQueue;

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
    public function run()
    {

        $this->_queue = new MiddlewareQueue();
        $this->_queue->run();
        # dump($this->_queue->run());

    }

}
