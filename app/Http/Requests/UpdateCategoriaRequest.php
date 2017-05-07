<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class UpdateCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function __construct(Route $route)
    {
        $this->route = $route;
    }

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
            'cat_nombre' => 'required|min:3|max:40|unique:categorias,cat_nombre,'.$this->route->getParameter('categoria'),
            'cat_descripcion'=>'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'cat_nombre.required'=>'La categoria es obligatoria',
            'cat_nombre.min'=>'La categoria ingresada debe tener un minimo de 3 caracteres',
            'cat_nombre.unique'=>'La categoria ingresada ya se encuentra en uso',
            'cat_descripcion.required'=>'La descripcion es obligatoria',
            'cat_descripcion.max'=>'La descripción no debe superar los 250 caracteres'
        ];
    }
}
