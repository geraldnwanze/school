<?php

namespace App\Models;

use App\Enums\MaritalStatusEnum;
use App\Traits\UUIDTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'marital_status' => MaritalStatusEnum::class
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'teacher_subjects');
    }

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'teacher_classrooms');
    }
}
