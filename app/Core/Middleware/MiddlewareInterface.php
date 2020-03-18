<?php

namespace App\Core\Middleware;

use App\Core\Request;

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
     * @param Request $request Container to manage.
     * @return Request Modified container.
     * @access public.
     */
    public function let (Request $request) : Request;

}
