<?php

namespace App\Controllers;

use Engine\Decorators\Auth;
use Engine\Request;
use Engine\View;
use App\Models\User;
use App\Models\Group;
use App\Models\Permission;
use Engine\Decorators\Redirection;

/**
 * ManageUsers.php
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
    public static function toGroupsPage(Request $request)
    {
        $id = Auth::authenticated();
        $user = User::getById($id);
        $request->view = new View('manage_groups/groups.php', [
            'title' => 'Groups',
            'id' => $user['id'],
            'name' => $user['name'],
            'groups' => Group::getAll(),
        ]);
    }

    /**
     * Go to edit page.
     *
     * @access public
     * @param Request $request
     */
    public static function toPermissionsPage(Request $request, int $id)
    {
        $user = User::getById($id);
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
     * Go to edit page.
     *
     * @access public
     * @param Request $request
     */
    public static function assign(Request $request, int $id)
    {
        Permission::associateById($id, $request->parameters['permission']);
        Redirection::redirect("/groups/{$id}/permissions");
    }

    /**
     * Go to edit page.
     *
     * @access public
     * @param Request $request
     */
    public static function disassign(Request $request, int $id)
    {
        Permission::disassociateById($id, $request->parameters['permission']);
        Redirection::redirect("/groups/{$id}/permissions");
    }

}
