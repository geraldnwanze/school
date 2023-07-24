<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait TeacherTrait
{
    public static function bootTeacherTrait()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
            $model->login_id = Str::random(6);
        });
    }
}
