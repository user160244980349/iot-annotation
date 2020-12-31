<?php

namespace Engine\Packages\Middleware\Bundled;

use Engine\Packages\Receive\Request;

/**
 * IMiddleware.php
 *
 * Interface to provide blocks, that can be iterated
 * like stages to format response.
 */
interface IMiddleware
{

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request -Request to manage
     * @return Request - Modified request
     */
    public function let(Request $request): Request;

}
