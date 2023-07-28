<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function scopeCurrent($query)
    {
        $query = $query->where('status', StatusEnum::ACTIVE->value)->first();
        $from = $query->from;
        $to = $query->to;
        $current = $from . '/' . $to;
        return $current;
    }

    public static function scopeActive($query)
    {
        return $query->where('status', StatusEnum::ACTIVE->value)->first();
    }
}
