<?php

namespace App\Models;

use App\Traits\ConvertInputToLowerCase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classroom extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function subClassrooms()
    {
        return $this->hasMany(SubClassroom::class);
    }
}
