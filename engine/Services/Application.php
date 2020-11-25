<?php

namespace Engine\Services;

use Engine\MiddlewaresQueue;

/**
 * Application.php
 *
 * Main class for application.
 */
class Application
{
    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'application';

    /**
     * Application run method.
     *
     * @access public
     * @return void
     */
    public function run(): void
    {
        $queue = new MiddlewaresQueue();
        $queue->run();
    }

}
