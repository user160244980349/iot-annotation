<?php

namespace Engine\Services;

use Engine\Config;
use Engine\Service;

/**
 * Debug.php
 *
 * Debug class for application.
 */
class DebugService extends Service
{

    /**
     * Alias for service.
     *
     * @access public
     * @var string
     */
    static public string $alias = 'debug';

    /**
     * Objects to print.
     *
     * @access public
     * @var array
     */
    private array $_items = [];

    /**
     * If debug printing allowed.
     *
     * @access private
     * @var bool
     */
    private bool $_allowed;

    /**
     * Constructor.
     *
     * @access public
     */
    public function __construct()
    {
        $env = Config::get('env');
        $this->_allowed = $env['debug'];
    }

    /**
     * Pushes new object to print queue.
     *
     * @access public
     * @param $obj - Object to print
     * @return void
     */
    protected function push($obj): void
    {
        array_push($this->_items, $obj);
    }

    /**
     * Prints objects if it is allowed.
     *
     * @access public
     * @return void
     */
    protected function printIfAllowed(): void
    {
        if (count($this->_items) > 0 && $this->_allowed) {
            dump($this->_items);
        }
    }

}
