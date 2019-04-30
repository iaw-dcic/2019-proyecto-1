<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarVisibilidad implements Rule
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
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (strcmp("Public",$value) == 0) || (strcmp("Private",$value) == 0);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El parametro recibido para la visibilidad es inválido';
    }
}
