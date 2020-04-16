<?php


namespace App\Http\Services;

use App\Exceptions\BaseException;
use App\Exceptions\Error;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleService
{
    public function getAll()
    {
        return Role::with('permissions')->orderBy('name', 'asc')
            ->get();
    }

    public function getAllPermissions()
    {
        return Permission::orderBy('name', 'asc')
            ->get();
    }

    public function getFirst($id)
    {
        $role = Role::where('id', $id)
            ->first();

        if (empty($role)) throw new BaseException(Error::$NOT_FOUND);
        return $role;
    }

    public function store($request, $data)
    {
        $roleID = !empty($data['role']) ? $data['role']->id : null;
        $role = Role::firstOrNew(['id' => $roleID]);
        $role->name = $request->name;
        $role->save();

        $role->syncPermissions($request->permissions);

        return $role;
    }
}
