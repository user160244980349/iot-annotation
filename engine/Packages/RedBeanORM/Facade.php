<?php

namespace Engine\Packages\RedBeanORM;

use Engine\Packages\ServiceBus;

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
    public static function r()
    {
        return ServiceBus::instance()->get('database')->r();
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
