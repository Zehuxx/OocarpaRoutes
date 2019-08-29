<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlanStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    { 
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:4',
            'description' => 'required|min:10',
            'price' => 'required|min:6',
            'duration' => 'required|min:5',
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El nombres es obligatorio',
            'name.min' => 'La longitud mínima es 5',

            'description.required' => 'La descripcion es obligatoria',
            'descripcion.min' => 'La longitud mínima es 10',

            'price.required' => 'El precio es obligatorio',
            'price.min' => 'La longitud mínima es 7',

            'duration.required' => 'El nombres es obligatorio',
            'duration.min' => 'La longitud mínima es 5',
        ];
    }
}
