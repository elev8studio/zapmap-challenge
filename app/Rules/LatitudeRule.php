<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class LatitudeRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param string $attribute
     * @param mixed $value
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $regex = '/^[-]?((([0-8]?[0-9])(\.(\d+))?)|(90(\.0+)?))$/';

        if (!preg_match($regex, $value)) {
            $fail('The :attribute must be a valid latitude coordinate in decimal degrees format.');
        }
    }
}
