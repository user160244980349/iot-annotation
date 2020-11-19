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
     * Application run method.
     *
     * @access public
     */
    public function run(): void
    {

        $queue = new MiddlewaresQueue();
        $queue->run();

    }

}
