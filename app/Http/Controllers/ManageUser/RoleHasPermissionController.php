<?php

namespace App\Http\Controllers\ManageUser;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleHasPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::whereNotIn('name', ['admin', 'super admin'])->get();
        $title = 'Role Has Permission';
        return view('manajemen-user.role-permission.index', compact('roles', 'title'));
    }

    public function getPermission($id = null)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions;
        $title = 'All Permission By Role ' .  ucwords($role->name);
        return view('manajemen-user.role-permission.get-permission', compact('permissions', 'title', 'role', 'rolePermissions'));
    }

    public function hasPermission(Request $request)
    {
        $roleId = $request->input('roleId');
        $permissionId = $request->input('permissionId');
        $action = $request->input('action');

        $role = Role::find($roleId);
        $permission = Permission::find($permissionId);

        $role->givePermissionTo($permission);

        if ($action == 'insert') {
            $role->givePermissionTo($permission);
            $message = [
                'message' => 'Created permission succesfully',
                'alert' => 'success'
            ];
        } else {
            $role->revokePermissionTo($permission);
            $message = [
                'message' => 'Remove permission succesfully',
                'alert' => 'error'
            ];
        }
        return response()->json(['success' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
