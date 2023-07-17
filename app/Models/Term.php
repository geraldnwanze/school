<?php

namespace App\Models;

use App\Enums\StatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Term extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function scopeActive($query)
    {
        return $query->where('status', StatusEnum::ACTIVE->value)->first();
    }
}
