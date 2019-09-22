<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationStoreRequest extends FormRequest
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
            'name' => 'required|min:5',
            'lat' => 'required',
            'lng' => 'required',
            'marker' => 'image|mimes:png|max:4096|dimensions:max_width=95, max_height=237'
        ];
    }

    public function messages(){
        return[
            'name.required' => 'El nombres de la ubicación o sucursal es obligatorio',
            'name.min' => 'La longitud mínima es 5',

            'lat.required' => 'La latitud es obligatoria',

            'price.required' => 'El longitud es obligatoria',

            'marker.image' => 'El archivo debe ser una imagen',
            'marker.mimes' => 'El archivo debe ser extensión png y sin color de fondo',
            'marker.max' => 'El tamaño máximo del archivo es 4 mb',
            'marker.dimensions' => 'Las dimensiones máximas son 95x237'
        ];
    }
}
