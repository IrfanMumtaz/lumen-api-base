<?php


namespace App\Http\Businesses\V1;

use App\Http\Services\V1\RoleService;


class RoleBusiness
{
    public static function get()
    {
        return RoleService::getAll();
    }

    public static function getPermissions()
    {
        return RoleService::getAllPermissions();
    }

    public static function first($id)
    {
        return RoleService::getfirst($id);
    }

    public static function create($request)
    {
        $role = RoleService::store($request, []);
        return $role;
    }

    public static function edit($request, $id)
    {
        $role = self::first($id);
        $relationData['role'] = $role;

        $role = RoleService::store($request, $relationData);
        return $role;
    }

    public static function destroy($id)
    {
        $role = self::first($id);
        $role->delete();
    }
}
