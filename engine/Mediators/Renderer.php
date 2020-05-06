<?php

namespace Engine\Mediators;

use Engine\Request;

/**
 * Renderer.php
 *
 * Class Renderer - calls renderer display method.
 */
class Renderer implements IMediator
{

    /**
     * Method providing middlewares chain call.
     *
     * @param Request $request .
     * @return Request Modified request.
     * @access public.
     */
    public function let(Request $request): Request
    {
        $request->view->display();
        return $request;
    }

}
