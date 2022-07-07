<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }
//overwritte funkcije da se mogu ulogirat ili sa mailom ili s passom
     public function login(Request $request)
     {   
        $input = $request->all();
  
         $this->validate($request, [
             'username' => 'required',
            'password' => 'required',
         ]);
  
         $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? "email" : 'username';

         $credentials = array(
           $fieldType => $input['username'],
            'password' => $input['password']
            
            );
            

            
            
            
           // dd(Auth::attempt($credentials));
         if(Auth::attempt($credentials))
         {
             return redirect(route('home'));
         }else{dd (bcrypt($credentials['password']));
             return redirect(route('login'))
                 ->with('error','Email-Address And Password Are Wrong.');
         }
          
     }
}

