<?php

namespace App\Core;

use App\Core\Stages\Receiver;
use App\Core\Stages\Auth;
use App\Core\Stages\Router;
use App\Core\Stages\Access;
use App\Core\Stages\ControllerExecution;

/**
 * Application.php
 *
 * Main class for application.
 */
class Application
{
    /**
     * Pipeline for services.
     *
     * @var Pipeline.
     * @access private.
     */
    private $_pipeline;

    /**
     * Application constructor.
     *
     * @access public.
     */
    public function __construct ()
    {
        $this->_pipeline = new Pipeline([
            new Receiver(),
            new Router(),
            new Auth(),
            new Access(),
            new ControllerExecution(),
        ]);

        $appState = $this->_pipeline->run();
        # dump($appState);
    }

    /**
     * Application destructor.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->_pipeline = null;
    }

}