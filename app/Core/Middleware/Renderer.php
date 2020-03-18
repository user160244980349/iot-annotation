<?php

namespace App\Core\Middleware;

use App\Core\Request;
use App\Core\Middleware\MiddlewareInterface;

/**
 * Renderer.php
 *
 * Class Renderer - calls renderer display method.
 */
class Renderer implements MiddlewareInterface
{

    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request.
     * @return Request Modified request.
     * @access public.
     */
    public function let (Request $request) : Request
    {
        $request->view->display();
        return $request;
    }

}
