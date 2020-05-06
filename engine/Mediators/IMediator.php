<?php

namespace Engine\Mediators;

use Engine\Request;

/**
 * IMediator.php
 *
 * Interface to provide blocks, that can be iterated
 * like stages to format response.
 */
interface IMediator
{

    /**
     * Method providing mediator chain call.
     *
     * @access public
     * @param Request $request Request to manage
     * @return Request Modified request
     */
    public function let(Request $request): Request;

}
