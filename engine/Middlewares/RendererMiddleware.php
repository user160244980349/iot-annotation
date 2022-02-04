<?php

namespace Engine\Middlewares;

use Engine\Middlewares\IMiddleware;
use Engine\Request;

/**
 * Renderer.php
 *
 * Class Renderer - calls renderer display method.
 */
class RendererMiddleware implements IMiddleware
{

    /**
     * Method providing middlewares chain call.
     *
     * @access public
     * @param Request $request
     * @return Request
     */
    public function let(?Request $request): Request
    {
        if (isset($request->view)) {
            $request->view->display();
        }
        return $request;
    }

}
