<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Lista;

class validarNombreListaCrearLista implements Rule
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
        $lista = Lista::where('user_id',$this->user_id)->where('listname',$value)->first();

        return $lista==null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Usted ya tiene una lista con el nombre especificado';
    }
}
