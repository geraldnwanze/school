<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolFee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function attribute()
    {
        return $this->belongsTo(SchoolFeeAttribute::class, 'school_fee_attribute_id');
    }

    public function scopeActive($query)
    {
        return $query->where(['session_id' => Session::active()->id, 'term_id' => Term::active()->id])->get();
    }

    public function session()
    {
        return $this->belongsTo(Session::class);
    }


    public function term()
    {
        return $this->belongsTo(Term::class);
    }

}
