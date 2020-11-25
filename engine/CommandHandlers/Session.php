<?php

namespace Engine\CommandHandlers;

use Engine\Decorators\Session as S;

/**
 * Session.php
 *
 * Command class intended sessions management.
 */
class Session
{

    /**
     * Clears user sessions.
     *
     * @access public
     */
    public static function clear(): void
    {
        print("clearing sessions...\n");

        S::clearAll();

        print("sessions were cleared.\n");
    }

}