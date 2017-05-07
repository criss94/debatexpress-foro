<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoriaRequest extends FormRequest
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
            'cat_nombre' => 'required|min:3|max:40|unique:categorias,cat_nombre',
            'cat_descripcion'=>'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'cat_nombre.required'=>'El nombre de la categoria es obligatorio',
            'cat_nombre.min'=>'El minimo de la categoria es de 3 caracteres',
            'cat_nombre.max'=>'El máximo de la categoria es de 40 caracteres',
            'cat_nombre.unique'=>'La categoria ingresada ya se encuentra en uso',
            'cat_descripcion.required'=>'La descripcion es obligatoria',
            'cat_descripcion.max'=>'La descripción no debe superar los 255 caracteres'
        ];
    }
}
