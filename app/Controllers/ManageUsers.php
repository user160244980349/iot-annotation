<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Redirection\Facade as Redirection;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use App\Models\User;
use App\Models\Group;

/**
 * ManageUsers.php
 *
 * Controller class for users management.
 */
class ManageUsers
{

    /**
     * Goes to index page.
     *
     * @access public
     * @param Request $request
     */
    public static function toUsersPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_users/users.php', [
            'title' => 'Users',
            'id' => $user['id'],
            'name' => $user['name'],
            'users' => User::getAll(),
        ]);
    }

    /**
     * Goes to edit page.
     *
     * @access public
     * @param Request $request
     * @param int $id - User id
     */
    public static function toGroupsPage(Request $request, int $id)
    {
        $user = User::getById($id);
        $request->view = new View('manage_users/groups.php', [
            'title' => 'User groups',
            'id' => $user['id'],
            'name' => $user['name'],
            'groups' => Group::getForId($user['id']),
            'all_groups' => Group::getAll(),
        ]);
    }

    /**
     * Includes user in a group.
     *
     * @access public
     * @param Request $request
     * @param int $id - User id
     */
    public static function assign(Request $request, int $id)
    {
        Group::associateById($id, $request->parameters['group']);
        Redirection::redirect("/users/{$id}/groups");
    }

    /**
     * Excludes user from a group.
     *
     * @access public
     * @param Request $request
     * @param int $id - User id
     */
    public static function disassign(Request $request, int $id)
    {
        Group::disassociateById($id, $request->parameters['group']);
        Redirection::redirect("/users/{$id}/groups");
    }

}
