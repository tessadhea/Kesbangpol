<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index() {
        $roles = Role::whereNotIn('name', ['admin',])->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create(){


        return view('admin.roles.create');




    }
    public function store(request $request){

            $validated = $request->validate(['name'=> ['required','min:3','unique:roles']]);
            Role::create($validated);
            session()->flash('success', 'Your role has been saved');
            return to_route('admin.roles.index');


    }

   public function edit(Role $role){
        $permissions = Permission::all();
    
    return view('admin.roles.edit',compact('role','permissions'));

   }
   public function update(Request $request  , Role $role ){

    $validated = $request->validate(['name'=> 'required','min:3','unique:Role']);
    $role->update($validated);
    session()->flash('success', 'Your role has been updated');
    return to_route('admin.roles.index'); 



}
 public function destroy(Role $role)
 
 {

$role->delete();
session()->flash('success', 'Your role has been deleted');
return back();


 }

public function givePermission(Request $request, Role $role){

    if($role->hasPermissionTo($request ->permission)){
        session()->flash('success', 'already assign');
        return back();
        

    };
    $role->givePermissionTo($request ->permission);
    session()->flash('success', 'added');
        return back();
}
public function revokePermission(Role $role, Permission $permission){
    if($role->hasPermissionTo($permission)){
        $role->revokePermissionTo($permission);
        session()->flash('success', 'droped');
        return back();
        

    }
    session()->flash('success', 'tidak ada');
        return back();
        
}


}
