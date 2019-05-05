<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\partido;

class validarPartidosUnicosUsuario implements Rule
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
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
           
        $partido = partido::where('user_id',$this->user_id)->where('name',$value)->first();

        return $partido==null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El nombre especificado ya esta siendo utilizado por usted';
    }
}
