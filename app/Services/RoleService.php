<?php

namespace App\Services;

use App\Models\Role;

class RoleService
{
    public function getRoleList()
    {
        $roles = Role::all();
        return $roles;
    }

    public function storeRole($request)
    {
        $role = Role::create($request);
        $role->save();
        return $role;
    }

    public function editRole($id)
    {
        $role = Role::find($id);
        if (!$role) {
            return abort(404);
        }
        return $role;
    }

    public function updateRole($request, $id)
    {
        $role = Role::find($id);
        $role->update($request);
        $role->save();
        return $role;
    }

    public function deleteRole($id)
    {
        $role = Role::find($id);

        if ($role) {
            Role::destroy($id);
        }

    }
}
