<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RouteStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre'=>'max:25|required|regex:/^([A-Za-z]+[A-Za-z0-9 -]*)$/',//valores validos e-4,ew43, skd
            'descripcion'=>'required|max:100',
            'slc_tipo'=>'required|min:24|max:24',
        ];
    }


    public function messages()
    {
        return [
            'nombre.required' => "El campo 'Nombre' es obligatorio",
            'nombre.max' => "Caracteres maximos permitidos 25",
            'nombre.regex' => 'Nombres aceptables: abc, abc12, a-1, ruta 1',
            'descripcion.required' => "El campo 'Descripción' es obligatorio",
            'descripcion.max' => 'Caracteres maximos permitidos 100',
            'slc_tipo.required'=> "Campo 'Tipo ruta' requerido",
            'slc_tipo.min'=> 'Valor no permitido',
            'slc_tipo.max'=> 'Valor no permitido'
        ];
    }
}
