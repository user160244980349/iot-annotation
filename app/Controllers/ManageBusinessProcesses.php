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
class ManageBusinessProcesses
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
        $request->view = new View('manage_business_processes/business_processes.php', [
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
        $request->view = new View('manage_business_processes/create_business_process.php', [
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
    public static function toUpdatePage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_business_processes/update_business_process.php', [
            'title' => 'Home',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
