<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Routing\Controllers\HasMiddleware;
class RoleController extends Controller 
{
    public function __construct()
    {
        $this->middleware('permission:view role')->only('index');
        $this->middleware('permission:create role')->only('create');
        $this->middleware('permission:delete role')->only('destroy');
        $this->middleware('permission:edit role')->only('edit');
    }
    public function index() {
        $roles = Role::all();
        // dd($roles);
        // $roles = DB::select('SELECT * FROM roles INNER JOIN ');
        return view('roles-permissions.roles.index',compact('roles'));
    }

    public function create(){
        $permissions = DB::select('SELECT * FROM permissions');
        // var_dump($permissions);
        return view('roles-permissions.roles.add',compact('permissions'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        // dd($request->all());
        if(!empty($request->permissions)){
            // dd('ok');
            foreach($request->permissions as $permission){
                $role->givePermissionTo($permission);
            }
        }
        return redirect()->route('roles.index')->with('success','Role Created Successfully');
    }

    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        $haspermissions = $role->permissions->pluck('name');
        return view('roles-permissions.roles.edit',compact('role','permissions','haspermissions'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);
        if(!empty($request->permissions)){
            // dd('ok');
                $role->syncPermissions($request->permissions);
            
        }
        return redirect()->route('roles.index')->with('success', 'Role Updated Successfully');
    }
    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Role Deleted Successfully');
        } else {
            return redirect()->route('roles.index')->with('error', 'Role Not Found');
        }
    }
}
