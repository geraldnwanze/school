<?php

namespace App\Traits;

use App\Models\Session;
use Illuminate\Support\Str;

trait GenerateRegNoTrait
{
    public static function bootGenerateRegNoTrait()
    {
        static::creating(function ($model) {
            $model->reg_no = Session::active()->from . Str::random();
        });
    }
}


