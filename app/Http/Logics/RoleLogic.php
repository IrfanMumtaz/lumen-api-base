<?php


namespace App\Http\Logics;

use App\Http\Services\RoleService;


class RoleLogic
{
    public function get()
    {
        return (new RoleService())->getAll();
    }

    public function getPermissions()
    {
        return (new RoleService())->getAllPermissions();
    }

    public function first($id)
    {
        return (new RoleService())->getfirst($id);
    }

    public function create($request)
    {
        $role = (new RoleService())->store($request, []);
        return $role;
    }

    public function edit($request, $id)
    {
        $role = $this->first($id);
        $relationData['role'] = $role;

        $role = (new RoleService())->store($request, $relationData);
        return $role;
    }

    public function destroy($id)
    {
        $role = $this->first($id);
        $role->delete();
    }
}
