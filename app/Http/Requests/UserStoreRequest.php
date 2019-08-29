<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true; 
    }

    public function rules()
    {
        return [
            'nombre'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'company_name'=>'required',
            //'password' => 'required|same:password_confirmation|min:8',
            'phone'=> 'required|regex:/^([0-9]){8}$/',
            'descripcion'=> 'required|max:150',
            'address'=> 'required|max:100',
            'slc_cuenta'=>'required|integer',
        ];
    }


    public function messages()
    {
        return [
            'nombre.required' => "El campo 'Nombre' es obligatorio",
            'email.required' => "El campo 'Correo' es obligatorio",
            'email.unique' => 'Este correo ya esta en uso',
            'last_name.required' => "El campo 'Apellido' es obligatorio",
            'company_name.required' => "El nombre de la empresa es obligatorio",
            //'password.required' => "El campo 'Contraseña' es obligatorio",
            //'password.same' => 'Las contraseñas no coinciden',
            //'password.min' => 'La contraseña debe tener 8 caracteres minimo.',
            'phone.required'=>"El campo 'Telefono' es obligatorio",
            'phone.regex'=>'Valores valido de la forma 98765432',
            'descripcion.required'=>"El campo 'Descripción' es obligatorio.",
            'descripcion.max'=>'Solo 150 caracteres permitidos.',
            'address.required'=>"El campo 'Dirección' es obligatorio.",
            'address'=>'Solo 100 caracteres permitidos.',
            'slc_cuenta.required'=>"El campo 'Tipo usuario' es requerido.",
            'slc_cuenta.integer'=>"El valor no es permitido."
        ];
    }
}