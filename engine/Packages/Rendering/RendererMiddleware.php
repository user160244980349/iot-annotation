<?php

namespace Engine\Packages\Rendering;

use Engine\Packages\Middleware\Bundled\IMiddleware;
use Engine\Packages\Receive\Request;

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
