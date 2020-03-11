<?php

namespace App\Core;

use App\Core\Middlewares\Receiver;
use App\Core\Configuration as Conf;
use App\Core\Middlewares\MiddlewareInterface;

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
        ]);

        $appState = $this->_queue->run();

        # test app
        dump($appState);
    }

    /**
     * Application destructor.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->_queue = null;
    }

}
