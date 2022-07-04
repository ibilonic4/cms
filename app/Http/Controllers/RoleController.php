<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Str;
use App\Models\Permission;

class RoleController extends Controller
{
    //

    public function index(){
$roles = Role::all();
        return view('admin\roles\index', compact('roles'));
    }


    public function store(Role $role){

        request()->validate([
            'name'=> 'required'
        ]);


        Role::create([
            'name'=> Str::ucfirst(request('name')),
            'slug'=> Str::of(Str::lower(request('name')))->slug('-')
        ]);

        return back();
    }

    public function destroy(Role $role){

    $role->delete();

    session()->flash('role-delete','Role '.$role->name.' was deleted');

    return back();
    }


    public function edit(Role $role){
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role','permissions'));

    }


    public function update(Role $role){

        $role-> name = Str::ucfirst(request('name'));
        $role->slug = Str::of(Str::lower(request('name')))->slug('-');

       


        if($role->isDirty('name')){

            session()->flash('role-update','Role was updated');
            $role->save();
        } else {

            session()->flash('role-update','Nothing has changed'); 
        }

        

        return redirect(route('roles.index'));
    }


    public function attachPermission(Role $role){

        $role->permissions()->attach(request('permission'));

        return back();
    }

    public function detachPermission(Role $role){

        $role->permissions()->detach(request('permission'));

        return back();
    }

}
