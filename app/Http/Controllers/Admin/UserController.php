<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;



class UserController extends Controller
{
    public function index(){
        $users = User::all();
        if(request('nama')){
            $users = User::where('name','like','%'.request('nama').'%')->paginate(10);
        }
        $roles = Role::all();
       $admin = User::with('roles')->get()->filter(
        fn ($user) => $user->roles->where('name', 'admin')->toArray()
    )->count();
    $validator = User::with('roles')->get()->filter(
        fn ($user) => $user->roles->where('name', 'validator')->toArray()
    )->count();
    $userC = User::with('roles')->get()->filter(
        fn ($user) => $user->roles->where('name', 'user')->toArray()
    )->count();
   

        return view('admin.user.index', compact('users','roles','admin','validator','userC'));


    }

    public function show(User $user){
        $roles = Role::all();
        $permissions = Permission::all();

  return view('admin.user.detail', compact('roles','permissions','user'));


    }

    public function destroy(User $user)
 
    {
   
   $user->delete();
   session()->flash('success', 'Your user has been deleted');
   return back();
   
   
    }
    public function assignRole(Request $request, User $user )
 
 {
            if($user->hasRole($request->role)){

                       
                        session()->flash('success', 'exist');
       return back();

            }
                        $user->assignRole($request->role);
                        session()->flash('success', 'role assigned');
       return back();
 }
 public function removeRole(User  $user, Role $role ){
    if($user->hasRole($role)){

            $user->removeRole($role);
            session()->flash('success', 'role remove');
       return back();


    }



    
}
public function givePermission(Request $request, User $user){

    if($user->hasPermissionTo($request ->permission)){
        session()->flash('success', 'already assign');
        return back();
        

    };
    $user->givePermissionTo($request ->permission);
    session()->flash('success', 'added');
        return back();
}
public function revokePermission(User $user, Permission $permission){
    if($user->hasPermissionTo($permission)){
        $user->revokePermissionTo($permission);
        session()->flash('success', 'droped');
        return back();
        

    }
    session()->flash('success', 'tidak ada');
        return back();
        
}
}