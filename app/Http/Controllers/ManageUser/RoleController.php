<?php

namespace App\Http\Controllers\ManageUser;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'Role';
        $permissions = Permission::all();
        $roles = Role::with('permissions')->get();

        return view('manajemen-user.role.index', \compact('roles','title', 'permissions'));
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
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name
        ]);
        if ($request->permissions) {
            $role->givePermissionTo([$request->permissions]);
        }
        $message = 'Created has role successfully!';
        return redirect()->back()->with('success', $message);
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
        $title = 'Form Edit User';
        $permissions = Permission::all();
        $role = Role::find($id);
        return view('manajemen-user.role.edit', \compact('title', 'permissions', 'role'));
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
        $role = Role::find($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        if ($request->permissions) {

            if (!$role->hasPermissionTo([$request->permissions])) {

                $role->givePermissionTo($request->permissions);
            }
            $role->syncPermissions([$request->permissions]);
        }

        $message = 'Updated has role successfully!';
        return redirect()->route('admin.role.index')->with('success', $message);
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
        $role = Role::findOrFail($id);
        $role->delete();
        $message = 'Removed has role succesfully!';
        return redirect()->back()->with('success', $message);
    }
}
