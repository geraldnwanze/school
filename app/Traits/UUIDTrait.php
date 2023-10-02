<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UUIDTrait
{
    public static function bootUUIDTrait()
    {
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }
}


