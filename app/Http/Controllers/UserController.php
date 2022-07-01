<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
   public function index(){

    $users = User::all();
    return view('admin/users/index', compact('users'));

   }


    public function show(User $user){

        return view('admin/users/profile', compact('user'));
    }

    public function update(User $user){

        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255','unique:users','alpha_dash'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
          //  'password' => ['required', 'string', 'min:8', 'confirmed'],
            'avatar'=>['file'],
        ]);

        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();

    }

    public function destroy(User $user){

        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');
        return back();
    }
}
