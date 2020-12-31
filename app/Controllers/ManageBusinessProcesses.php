<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use App\Models\User;

/**
 * ManageBusinessProcesses.php
 *
 * Controller class for BP management.
 */
class ManageBusinessProcesses
{

    /**
     * Goes to index page.
     *
     * @access public
     * @param Request $request
     */
    public static function toIndexPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_business_processes/business_processes.php', [
            'title' => 'Business processes',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

    /**
     * Goes to BP create page.
     *
     * @access public
     * @param Request $request
     */
    public static function toCreatePage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_business_processes/create_business_process.php', [
            'title' => 'Create business process',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

    /**
     * Goes to BP edit page.
     *
     * @access public
     * @param Request $request
     */
    public static function toUpdatePage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_business_processes/update_business_process.php', [
            'title' => 'Update business process',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
