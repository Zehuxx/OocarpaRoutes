<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
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
    */
    public function __construct()
    {
       // $this->middleware('check.company.role');
    } 

    public function login(Request $request){
        $rules=[
        'email' => 'required|max:255',
        'password' => 'required|min:8',
        ];

        $messages = [
            'email.required' => 'El correo es requerido.',
            'password.required' => 'La contraseña es requerida.',
            'max' => 'La longitud del correo no debe ser mayor a 255.',
            'min' => 'La contraseña debe ser mayor a :min caracteres.',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator->messages());
        }

        $authUser = User::where('email', $request->email)->first();
        if (isset($authUser)) {
            if (Hash::check($request->password , $authUser->password)) {
                Auth::login($authUser);
                return redirect()->route('home');
            }else{
                return redirect()->back()->withErrors(['general'=>'Datos incorrectos']);
            }
        }else{
            return redirect()->back()->withErrors(['general'=>'Datos incorrectos']);
        }
    }

}
