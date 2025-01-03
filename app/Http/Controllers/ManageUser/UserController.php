<?php

namespace App\Http\Controllers\ManageUser;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = 'User';
        $roles = Role::all();
        $users = User::with('roles')->get();


        return view('manajemen-user.user.index', \compact('roles', 'title', 'users'));
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->roles) {
            $user->assignRole([$request->roles]);
        }
        $message = 'Created has user succesfully!';
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
        $roles = Role::all();
        $user = User::find($id);
        return view('manajemen-user.user.edit', \compact('title', 'user', 'roles'));
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

        $user = User::find($id);


        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        if ($request->roles) {

            if (!$user->hasRole([$request->roles])) {

                $user->assignRole($request->roles);
            }
            $user->syncRoles([$request->roles]);
        }

        $message = 'Updated has user succesfully!';
        return redirect()->route('admin.user.index')->with('success', $message);
    }

    public function changeRole(Request $request)
    {
        $userId = $request->input('userId');
        $selectedRoles = $request->input('roles');

        $user = User::find($userId);

        if ($user) {
            // Sync the selected roles
            $rolesToAssign = Role::whereIn('id', $selectedRoles)->get();
            $user->syncRoles($rolesToAssign);

            return redirect()->back()->with('success', 'Roles assigned successfully');
        }

        return redirect()->back()->with('error', 'User not found');
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
        $user = User::findOrFail($id);
        $user->delete();
        $message = 'Removed has user succesfully!';
        return redirect()->route('admin.user.index')->with('success', $message);
    }
}
