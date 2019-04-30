<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecetaRequest extends FormRequest
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
        'nombre' => 'required|max:255',
        'categoria' => 'required',
        'descr' => 'required|max:191',
        'pasos' => 'required|max:500',
        'lista' => 'required'
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'Nombre es un campo obligatorio.',
            'nombre.unique' => 'Ese nombre de receta ya esta en uso.',
            'categoria.required' => 'Categoria es un campo obligatorio.',
            'descr.required' => 'Descripcion es un campo obligatorio.',
            'pasos.required' => 'Pasos es un campo obligatorio.',
            'pasos.max' => 'No se puede mas de 500 caracteres.',
            'descr.max' => 'No se puede mas de 191 caracteres.',
            'lista.required' => 'Lista es un campo obligatorio.'
        ];
    }
}
