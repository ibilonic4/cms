<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    

    public function index(){

        return view('admin\permissions\index');
    }


    public function destroy(Permission $permission){
        $permission->delete();

        session()->flash('permission-delete','Permission '.$permission->name.' was deleted');
    
        return back();
        
    }


}
