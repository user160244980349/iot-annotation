<?php

namespace Engine\Packages\Debug;

use Engine\Packages\ServiceBus;

/**
 * Debug.php
 *
 * Debug service decorator.
 */
class Facade
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
