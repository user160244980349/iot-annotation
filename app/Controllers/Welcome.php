<?php

namespace App\Controllers;

use Engine\Auth\Facade as Auth;
use Engine\Receive\Request;
use Engine\Rendering\View;

/**
 * Welcome.php
 *
 * Controller class for welcome page.
 */
class Welcome
{

    /**
     * Goes to welcome page.
     *
     * @access public
     * @param Request $request
     */
    public static function toWelcomePage(Request $request)
    {
        $id = Auth::authenticated();

        $request->view = new View('welcome.php', [
            'id' => $id,
            'title' => 'Welcome',
        ]);
    }

}
