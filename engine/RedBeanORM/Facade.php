<?php

namespace Engine\RedBeanORM;

use Engine\ServiceBus;

/**
 * RB.php
 *
 * ORM decorator.
 */
class Facade
{

    /**
     * Gives RedBean facade.
     *
     * @access public
     * @return class
     */
    public static function get()
    {
        return ServiceBus::instance()->get('database')->get();
    }

    /**
     * Gives logs.
     *
     * @access public
     * @return array
     */
    public static function logs(): array
    {
        return ServiceBus::instance()->get('database')->logs();
    }

}
