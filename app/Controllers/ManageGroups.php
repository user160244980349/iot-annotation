<?php

namespace App\Controllers;

use Engine\Packages\Auth\Facade as Auth;
use Engine\Packages\Redirection\Facade as Redirection;
use Engine\Packages\Receive\Request;
use Engine\Packages\Rendering\View;
use App\Models\User;
use App\Models\Group;
use App\Models\Permission;

/**
 * ManageGroups.php
 *
 * Controller class for actors groups management.
 */
class ManageGroups
{

    /**
     * Goes to groups index page.
     *
     * @access public
     * @param Request $request
     */
    public static function toGroupsPage(Request $request)
    {
        $user = User::getById(Auth::authenticated());
        $request->view = new View('manage_groups/groups.php', [
            'title' => 'Groups',
            'id' => $user['id'],
            'name' => $user['name'],
            'groups' => Group::getAll(),
        ]);
    }

    /**
     * Goes to groups edit page.
     *
     * @access public
     * @param Request $request
     * @param int $id - User id
     */
    public static function toPermissionsPage(Request $request, int $id)
    {
        $user = User::getById(Auth::authenticated());
        $request->view = new View('manage_groups/permissions.php', [
            'title' => 'Permissions',
            'id' => $user['id'],
            'name' => $user['name'],
            'group' => Group::getById($id),
            'permissions' => Permission::getForGroup($id),
            'all_permissions' => Permission::getAll(),
        ]);
    }

    /**
     * Assign group.
     *
     * @access public
     * @param Request $request
     * @param int $id - User id
     */
    public static function assign(Request $request, int $id)
    {
        Permission::associateById($id, $request->parameters['permission']);
        Redirection::redirect("/groups/{$id}/permissions");
    }

    /**
     * Disassign group.
     *
     * @access public
     * @param Request $request.
     * @param int $id - User id
     */
    public static function disassign(Request $request, int $id)
    {   
        Permission::disassociateById($id, $request->parameters['permission']);
        Redirection::redirect("/groups/{$id}/permissions");
    }

}
