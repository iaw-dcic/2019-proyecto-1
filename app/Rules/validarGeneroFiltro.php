<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Genero;

class validarGeneroFiltro implements Rule
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
        return $value=='all' || Genero::where('genre', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El valor ingreso es inválido.';
    }
}
