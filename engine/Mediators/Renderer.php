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
     * Method providing mediator chain call.
     *
     * @access public
     * @param Request $request
     * @return Request Modified request
     */
    public function let(Request $request): Request
    {
        $request->view->display();
        return $request;
    }

}
