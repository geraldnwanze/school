<?php

namespace App\Models;

use App\Enums\MaritalStatusEnum;
use App\Traits\TeacherTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory, TeacherTrait;

    protected $guarded = [];

    protected $casts = [
        'marital_status' => MaritalStatusEnum::class
    ];
}
