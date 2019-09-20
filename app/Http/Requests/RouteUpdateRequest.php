<?php

namespace App\Http\Requests;
use App\Models\RouteType;
use Illuminate\Foundation\Http\FormRequest;

class RouteUpdateRequest extends FormRequest
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
            'slc_tipo'=>['required',
                      function($attribute, $value, $fail) {
                            $routetype = RouteType::where('_id',$value)->where('deleted_at', 'exists', false)->first();
                            if($routetype === null)
                                return $fail('Valor no permitido.');
                },
            ],
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
            'slc_tipo.required'=> "Campo 'Tipo ruta' requerido"
        ];
    }
}
