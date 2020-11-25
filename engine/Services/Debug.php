<?php

namespace Engine\Services;

use Engine\Env;


/**
 * Debug.php
 *
 * Debub class for application.
 */
class Debug
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public $alias = 'debug';

    /**
     * Objects to print.
     *
     * @access public
     * @var array
     */
    private $_items = [];

    /**
     * If debug printing allowed.
     *
     * @access private
     * @var bool
     */
    private $_allowed;

    /**
     * Constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $this->_allowed = ENV['debug'];
    }

    /**
     * Pushes new ibject to pring queue.
     *
     * @access public
     * @param $obj - Object to print
     * @return void
     */
    public function push($obj): void
    {
        array_push($this->_items, $obj);
    }

    /**
     * Prints objects if it is allowed.
     *
     * @access public
     * @return void
     */
    public function printIfAllowed(): void
    {
        if (count($this->_items) > 0 && $this->_allowed) {
            dump($this->_items);
        }
    }

}
