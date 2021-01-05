<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Businesses\V1\RoleBusiness;
use App\Http\Resources\SuccessResponse;
use App\Http\Resources\V1\PermissionsResponse;
use App\Http\Resources\V1\RolesResponse;
use App\Http\Resources\V1\RoleResponse;

class RoleController extends Controller
{
    private $module;

    public function __construct()
    {
        $this->module = 'acl';
        $ULP = '|' . $this->module . '_all|access_all'; //UPPER LEVEL PERMISSIONS
        $this->middleware('permission:' . $this->module . '_view' . $ULP, ['only' => ['index', 'show']]);
        $this->middleware('permission:' . $this->module . '_add' . $ULP, ['only' => ['store']]);
        $this->middleware('permission:' . $this->module . '_edit' . $ULP, ['only' => ['update']]);
        $this->middleware('permission:' . $this->module . '_delete' . $ULP, ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = RoleBusiness::get();
        return new RolesResponse($roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = RoleBusiness::create($request);
        return new RoleResponse($role);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = RoleBusiness::first($id);
        return new RoleResponse($role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $role = RoleBusiness::edit($request, $id);
        return new RoleResponse($role);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = RoleBusiness::destroy($id);
        return new SuccessResponse([]);
    }
}
