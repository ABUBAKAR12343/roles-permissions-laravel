<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Spatie\Permission\Models\Permission;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class PermissionController extends Controller 
{
    public function __construct()
    {
        $this->middleware('permission:view permission')->only('index');
        $this->middleware('permission:add permission')->only('create');
        $this->middleware('permission:delete permission')->only('destroy');
        $this->middleware('permission:edit permission')->only('edit');
    }
    public function index() {
        $permissions = Permission::all();
        return view('roles-permissions.permissions.index',compact('permissions'));
    }

    public function create(){
        return view('roles-permissions.permissions.add');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required'
        ]);

        Permission::create([
            'name' => $request->name,
        ]);

        return redirect()->route('permissions.index')->with('success','Permission Created Successfully');
    }

    public function edit($id){
        $permission = Permission::find($id);
        return view('roles-permissions.permissions.edit',compact('permission'));
    }
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
    
        $permission = Permission::findOrFail($id);
        $permission->update([
            'name' => $request->name,
        ]);
        return redirect()->route('permissions.index')->with('success', 'Permission Updated Successfully');
    }
    public function destroy($id)
    {
        $permission = Permission::find($id);
        if ($permission) {
            $permission->delete();
            return redirect()->route('permissions.index')->with('success', 'Permission Deleted Successfully');
        } else {
            return redirect()->route('permissions.index')->with('error', 'Permission Not Found');
        }
    }
    
}
