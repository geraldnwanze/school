<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;

trait SendValidationErrorsToToast
{
    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        $errors = implode("<br>", $errors);
        toast($errors, 'error');
    }
}


