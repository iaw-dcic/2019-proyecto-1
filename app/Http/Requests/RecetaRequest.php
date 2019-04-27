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
        'descr' => 'required',
        'pasos' => 'required',
        'lista' => 'required'
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'Nombre es un campo obligatorio.',
            'categoria.required' => 'Categoria es un campo obligatorio.',
            'descr.required' => 'Descripcion es un campo obligatorio.',
            'pasos.required' => 'Pasos es un campo obligatorio.',
            'lista.required' => 'Lista es un campo obligatorio.'
        ];
    }
}
