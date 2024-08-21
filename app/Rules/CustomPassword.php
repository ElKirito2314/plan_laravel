<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CustomPassword implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/[A-Z]/', $value) && // Pelo menos uma letra maiúscula
               preg_match('/[a-z]/', $value) && // Pelo menos uma letra minúscula
               preg_match('/[0-9]/', $value) && // Pelo menos um número
               preg_match('/[\W]/', $value);    // Pelo menos um símbolo
    }

    public function message()
    {
        return 'A :attribute deve conter pelo menos uma letra maiúscula, uma letra minúscula, um número e um símbolo.';
    }
}
