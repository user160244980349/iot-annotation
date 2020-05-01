<?php

namespace Engine\Middleware;

use Engine\Entity\Request;

/**
 * MiddlewareInterface.php
 *
 * Interface to provide blocks, that can be iterated
 * like stages to format response.
 */
interface MiddlewareInterface
{

    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request Request to manage.
     * @return Request Modified request.
     * @access public.
     */
    public function let(Request $request): Request;

}
