<?php

namespace App\Models;

use App\Traits\SchoolFeePaymentTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFeePayment extends Model
{
    use HasFactory, SchoolFeePaymentTrait;

    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function schoolFee()
    {
        return $this->belongsTo(SchoolFee::class);
    }

    public function class()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function term()
    {
        return $this->belongsTo(Term::class);
    }

    public function history()
    {
        return $this->hasOne(SchoolFeePaymentHistory::class);
    }
}
