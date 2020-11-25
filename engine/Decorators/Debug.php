<?php

namespace Engine\Decorators;

use Engine\ServiceBus;


/**
 * Debug.php
 *
 * Debug service decorator.
 */
class Debug
{

    /**
     * Pushes new object to print.
     *
     * @access public
     * @param mixed $obj - Object to print
     * @return string
     */
    public static function push($obj): void
    {
        ServiceBus::instance()->get('debug')->push($obj);
    }

    /**
     * Prints objects if it is allowed.
     *
     * @access public
     * 
     * @return void
     */
    public static function printIfAllowed(): void
    {
        ServiceBus::instance()->get('debug')->printIfAllowed();
    }

}
