<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Permission;
use App\Models\Role;

class PermissionController extends Controller
{
    

    public function index(){
      $permissions = Permission::all();
        return view('admin\permissions\index', compact('permissions'));
    }


    public function destroy(Permission $permission){
        $permission->delete();

        session()->flash('permission-delete','Permission '.$permission->name.' was deleted');
    
        return back();
        
    }

    public function store(Permission $permission){

        request()->validate([
            'name'=> 'required'
        ]);


        Permission::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function edit(Permission $permission){
        $roles = Role::all();
        return view('admin.permissions.edit', compact('roles','permission'));

    }


    public function update(Permission $permission){

        $permission-> name = Str::ucfirst(request('name'));
        $permission->slug = Str::of(Str::lower(request('name')))->slug('-');

       


        if($permission->isDirty('name')){

            session()->flash('permission-update','Permission was updated');
            $permission->save();
        } else {

            session()->flash('permission-update','Nothing has changed'); 
        }

        

        return redirect(route('permissions.index'));
    }


    public function attachRole(Permission $permission){

        $permission->roles()->attach(request('role'));

        return back();
    }

    public function detachRole(Permission $permission){

        $permission->roles()->detach(request('role'));

        return back();
    }

}



