<?php

namespace Engine\Rendering;

use Engine\Middleware\Bundled\IMiddleware;
use Engine\Receive\Request;

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
        $request->view->display();
        return $request;
    }

}
