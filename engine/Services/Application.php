<?php

namespace Engine\Services;

use Engine\MediatorsQueue;

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

        $queue = new MediatorsQueue();
        $queue->run();

        # Debug output
        # dump($this->_queue->run());

    }

}
