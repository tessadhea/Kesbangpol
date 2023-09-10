<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PremissionController extends Controller
{
    public function index() {
            $permissions = Permission::paginate(10);
            if(request('nama')){
                $permissions = Permission::where('name','like','%'.request('nama').'%')->paginate(10);
            }


        return view('admin.permission.index', compact('permissions'));
    }

    public function create(){

        return view('admin.permission.create');
    }

    public function store(request $request) {

        $validated = $request->validate(['name'=> 'required','min:3','unique:permission']);
        Permission::create($validated);
        session()->flash('success', 'Your premission has been saved');
        return to_route('admin.permission.index'); 


     


    }
    public function edit(Permission $permission){
        $roles = Role::all();

        return view('admin.permission.edit',compact('permission','roles'));
    }


    public function update(Request $request  , Permission $Permission ){

        $validated = $request->validate(['name'=> 'required','min:3','unique:permission']);
        $Permission->update($validated);
        session()->flash('success', 'Your premission has been updated');
        return to_route('admin.permission.index'); 



    }
    public function destroy(Permission $permission)
 
 {

$permission->delete();
session()->flash('success', 'Your permission has been deleted');
return back();


 }
 public function assignRole(Request $request, Permission $permission )
 
 {
            if($permission->hasRole($request->role)){

                       
                        session()->flash('success', 'exist');
       return back();

            }
                        $permission->assignRole($request->role);
                        session()->flash('success', 'role assigned');
       return back();
 }
 public function removeRole(Permission $permission, Role $role ){
    if($permission->hasRole($role)){

            $permission->removeRole($role);
            session()->flash('success', 'role remove');
       return back();


    }
    session()->flash('success', 'role not existed');
    return back();

}
}
