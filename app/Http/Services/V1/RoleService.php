<?php


namespace App\Http\Services\V1;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public static function getAll()
    {
        return Role::with('permissions')->orderBy('name', 'asc')
            ->get();
    }

    public static function getFirst($id)
    {
        $role = Role::where('id', $id)
            ->first();
        return $role;
    }

    public static function store($request, $data)
    {
        $roleID = !empty($data['role']) ? $data['role']->id : null;
        $role = Role::firstOrNew(['id' => $roleID]);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);

        return $role;
    }
}
