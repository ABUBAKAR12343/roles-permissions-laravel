<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::find($id);
        $roles =Role::all() ;
        $hasRoles = $user->roles->pluck('id');
        return view('users.edit', compact('user','roles','hasRoles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Add other fields as necessary
        ]);
        if (!empty($request->role)) {
            $user->syncRoles($request->role); // Sync multiple roles
        }
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
}
