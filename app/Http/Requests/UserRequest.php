<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'apellido' => 'required',
            'email'=> 'required|unique:users',
            'password' => 'required'
        ];
    }
    public function messages(){
        return [
            'nombre.required' => 'Nombre es un campo obligatorio.',
            'apellido.required' => 'Apellido es un campo obligatorio.',
            'email.required' => 'Correo electrónico es un campo obligatorio.',
            'email.unique' => 'Correo electrónico ya esta en uso.'
        ];
    }
}
