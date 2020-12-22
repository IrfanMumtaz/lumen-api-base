<?php


namespace App\Http\Businesses;

use App\Http\Services\RoleService;


class RoleBusiness
{
    public static function get()
    {
        return (new RoleService())->getAll();
    }

    public static function getPermissions()
    {
        return (new RoleService())->getAllPermissions();
    }

    public static function first($id)
    {
        return (new RoleService())->getfirst($id);
    }

    public static function create($request)
    {
        $role = (new RoleService())->store($request, []);
        return $role;
    }

    public static function edit($request, $id)
    {
        $role = self::first($id);
        $relationData['role'] = $role;

        $role = (new RoleService())->store($request, $relationData);
        return $role;
    }

    public static function destroy($id)
    {
        $role = self::first($id);
        $role->delete();
    }
}
