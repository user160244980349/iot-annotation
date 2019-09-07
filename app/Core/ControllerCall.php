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
     * @param AppState $state.
     * @access public.
     */
    public function exec (AppState $state)
    {
        call_user_func($this->_method, $state, ...$this->_args);
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

    /**
     * ControllerCall destructor.
     *
     * @access public.
     */
    public function __destruct ()
    {
        $this->_method = null;
        $this->_args = null;
    }

}