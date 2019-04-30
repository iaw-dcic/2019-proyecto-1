<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
use Auth;
class validarEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     * * No considero el usuario actual en el caso de que se apriete actualizar datos sin realizar cambios
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $emailUserActual = Auth::user()->email;
        $existe=User::where('email',$value)->get()->first();
        return $existe==null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Existe un usuario registrado con ese email. Por favor, ingrese otro.';
    }
}
