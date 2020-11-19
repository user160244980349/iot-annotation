<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use App\Models\User;

/**
 * ManageGroups.php
 *
 * Controller class for managment of actors groups.
 */
class ManageGroups
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
        $request->view = new View('manage_groups/index_users.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
            'users' => User::getAll(),
        ]);
    }

    /**
     * Go to edit page.
     *
     * @access public
     * @param Request $request
     */
    public static function toEditPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_groups/edit_groups.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
