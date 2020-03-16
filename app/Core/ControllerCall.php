<?php

namespace App\Core;

/**
 * ControllerCall.php
 *
 * Class ControllerCall - calls controller by provided names and args.
 */
class ControllerCall
{
    /**
     * Class and method to call.
     *
     * @var array.
     * @access private.
     */
    private $_method;

    /**
     * Arguments to paste in method.
     *
     * @var array.
     * @access private.
     */
    private $_args;

    /**
     * Exec controller method.
     *
     * @access public.
     */
    public function getMethodName ()
    {
        return $this->_method;
    }

    /**
     * Exec controller method.
     *
     * @param Request $request.
     * @access public.
     */
    public function exec (Request $request)
    {
        forward_static_call($this->_method, $request, ...$this->_args);
    }

    /**
     * ControllerCall constructor.
     *
     * @param array $method Calling method.
     * @param array $args Arguments for method.
     * @access public.
     */
    public function __construct (array $method, array $args)
    {
        $this->_method = $method;
        $this->_args = $args;
    }

}
