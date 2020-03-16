<?php

namespace App\Core\Middleware;

use App\Core\AppState;

/**
 * MiddlewareInterface.php
 *
 * Interface to provide blocks, that can be iterated
 * like stages of response formation.
 */
interface MiddlewareInterface
{
    /**
     * Do some job.
     *
     * @param AppState $state Container to manage.
     * @return AppState Modified container.
     * @access public.
     */
    public function let (AppState $state);

}
