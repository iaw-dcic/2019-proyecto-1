<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;
use Auth;

class validarNickname implements Rule
{
    public $nickNameActual;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($nickNameActual)
    {
        $this->nickNameActual = $nickNameActual;
    }

    /**
     * Determine if the validation rule passes.
     * No considero el usuario actual en el caso de que se apriete actualizar datos sin realizar cambios
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $idUserActual = Auth::user()->id;
        $existe = User::where('nickname', $value)->get()->first();

        return ($existe->id == $idUserActual);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Existe un usuario registrado con ese nickname. Por favor ingrese otro.';
    }
}
