<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Company;
use MongoDB\BSON\ObjectID; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('guest');
    } */

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:15'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function register(Request $request){
        $rules_user= [
            'name'=>'required',
            'last_name'=>'required',
            'email'=>['required',
                      'email',
                      function($attribute, $value, $fail) {
                        if($attribute == 'email'){
                            $user = User::where($attribute,$value)->where('deleted_at', 'exists', false)->first();
                            if($user !== null)
                                return $fail('Este correo ya esta en uso.');
                        }

                },
            ],
            'slc_cuenta'=>'required|integer',
            'password' => 'required|same:password_confirmation|min:8',
        ];

        $rules_company= [
            'company_name'=>'required',
            'phone'=> 'required|regex:/^([0-9]){8}$/',
            'descripcion'=> 'required|max:10',
            'address'=> 'required|max:100',
        ];

        $messages = [
            'name.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio",
            'last_name.required' => "El campo 'Apellido' es obligatorio",
            'company_name.required' => "El nombre de la empresa es obligatorio",
            'password.required' => "El campo 'Contraseña' es obligatorio",
            'password.same' => 'Las contraseñas no coinciden',
            'password.min' => 'La contraseña debe tener 8 caracteres minimo.',
            'phone.required'=>"El campo 'Telefono' es obligatorio",
            'phone.regex'=>'Valores valido de la forma 98765432',
            'descripcion.required'=>"El campo 'Descripción' es obligatorio.",
            'descripcion.max'=>'Solo 150 caracteres permitidos.',
            'address.required'=>"El campo 'Dirección' es obligatorio.",
            'address'=>'Solo 100 caracteres permitidos.',
            'slc_cuenta.required'=>"El campo 'Tipo usuario' es requerido.",
            'slc_cuenta.integer'=>"Tipo de usuario invalido."
        ];

        if ($request->slc_cuenta==2) {
            $this->validate($request, $rules_user, $messages);
            $this->validate($request, $rules_company, $messages);
        }else{
            $this->validate($request, $rules_user, $messages);
        }
        $user=new User();
        $user->role_id = $request->slc_cuenta;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_img= null;
            if ($user->role_id==1) { 
                //normal 5d607fa9b2d1b72ef0ec1367
                $user->role_id =new ObjectID('5d607fa9b2d1b72ef0ec1367');
                $user->save();
                Auth::login($user); //esta linea siempre debe ir 1 antes del return
                return redirect()->route('home');
             }elseif ($user->role_id==2) { 
                //empresa 5d607fb2b2d1b72ef0ec1368
                $company=new Company();
                $user->role_id =new ObjectID('5d607fb2b2d1b72ef0ec1368');
                $user->save();
                $company->user_id =new ObjectID($user->id);
                $company->name = $request->company_name;
                $company->phone = $request->phone;
                $company->description = $request->descripcion;
                $company->address = $request->address;
                $company->save();
                Auth::login($user); //esta linea siempre debe ir 1 antes del return
                return redirect()->route('home');
             }else{
                return redirect()->back()->withErrors(["slc_cuenta"=>"Tipo de usuario invalido"]);
             }
    }
}
