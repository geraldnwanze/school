<?php

namespace App\Models;

use App\Enums\GenderEnum;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['classroom'];

    protected $casts = [
        'gender' => GenderEnum::class,
        'dob' => 'date'
    ];

    public function fullname(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['last_name'] . ' ' . $attributes['first_name'] . ' ' . $attributes['other_names']
        )->withoutObjectCaching();
    }

    public function dob(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['dob'])->format('Y-m-d')
        )->withoutObjectCaching();
    }

    public function age(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::parse($attributes['dob'])->age
        )->withoutObjectCaching();
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
