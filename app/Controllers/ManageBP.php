<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use App\Models\User;

/**
 * ManageBP.php
 *
 * Controller class for management of BP.
 */
class ManageBP
{

    /**
     * Go to index page.
     *
     * @access public
     * @param Request $request
     */
    public static function toIndexPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_bp/index_bp.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

    /**
     * Go to create BP page.
     *
     * @access public
     * @param Request $request
     */
    public static function toCreatePage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_bp/create_bp.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

    /**
     * Go to edit BP page.
     *
     * @access public
     * @param Request $request
     */
    public static function toEditPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_bp/edit_bp.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
