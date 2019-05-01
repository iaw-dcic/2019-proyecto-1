<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\User;


class validarNickname implements Rule
{
    public $user_id;
 
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_id)
    {
        $this->user_id = $user_id;
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
      
        $existe = User::where('id','<>',$this->user_id)->where('nickname', $value)->get()->first();

        return $existe==null;
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
