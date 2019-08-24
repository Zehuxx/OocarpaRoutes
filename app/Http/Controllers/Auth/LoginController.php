<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Redirect;

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
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    } */

    public function login(Request $request){
        $this->validate($request, [
                'email' => 'required|max:255',
                'password' => 'required|max:255'
        ]);

         $authUser = User::where('email', $request->email)->first();
         
        if (isset($authUser)) {
            if (Hash::check($request->password , $authUser->password)) {
                Auth::logout();
                Auth::login($authUser);
                return redirect()->route('home');
            }else{
                return redirect()->back()->withErrors(["email"=>"email incorrecto","password"=>"password incorrecta"]);
            }
        }else{
            return redirect()->back()->withErrors(["email"=>"email incorrecto","password"=>"password incorrecta"]);
        }
    }

}
