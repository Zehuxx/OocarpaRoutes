<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerStoreRequest extends FormRequest
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
            'banner'=>'required|image|mimes:jpeg,bmp,jpg,png|max:4096'
        ];
    }

    public function messages()
    {
        return [
            'banner.required'=>"La foto es obligatoria",
            'banner.max'=>"La foto no debe tener mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'banner.image'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png",
            'banner.mimes'=>"La foto no debe tener un peso mayor a 4 MB, y debe de tener una extension bmp,jpeg,jpg o png"
        ];
    }
}
