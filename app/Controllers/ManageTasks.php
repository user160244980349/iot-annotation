<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use App\Models\User;

/**
 * ManageTasks.php
 *
 * Controller class for tasks management.
 */
class ManageTasks
{

    /**
     * Goes to run task page.
     *
     * @access public
     * @param Request $request
     */
    public static function toRunPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_tasks/run_task.php', [
            'title' => 'Run task',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

    /**
     * Goes to do task page.
     *
     * @access public
     * @param Request $request
     */
    public static function toDoPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_tasks/task.php', [
            'title' => 'Task',
            'id' => $user['id'],
            'name' => $user['name'],
        ]);
    }

}
