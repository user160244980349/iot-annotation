<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use App\Models\User;

/**
 * ManageActions.php
 *
 * Controller class for management of actions.
 */
class ManageActions
{

    /**
     * Go to run action page.
     *
     * @access public
     * @param Request $request
     */
    public static function toRunPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_actions/run_action.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

    /**
     * Go to do action page.
     *
     * @access public
     * @param Request $request
     */
    public static function toDoPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_actions/view_action.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
