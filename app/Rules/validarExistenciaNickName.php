<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\user;

class validarExistenciaNickName implements Rule
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
        $user = User::where('nickname', $value)->get()->first();

        return $user != null;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'No existe un usuario con ese Nickname.';
    }
}
