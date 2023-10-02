<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Traits\GenerateRegNoTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, GenerateRegNoTrait;

    protected $guarded = [];

    protected $casts = [
        'status' => StatusEnum::class
    ];

    public function profile()
    {
        return $this->hasOne(StudentProfile::class);
    }

    public function active(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => ($attributes['status'] == StatusEnum::ACTIVE->value) ? true : false
        );
    }

    public function account()
    {
        return $this->hasOne(Account::class);
    }

    public function offencePayments()
    {
        return $this->hasMany(OffencePayment::class);
    }

}
