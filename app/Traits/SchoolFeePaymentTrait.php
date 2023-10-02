<?php

namespace App\Traits;

use App\Enums\StatusEnum;
use App\Models\SchoolFee;
use App\Models\Session;
use App\Models\Term;

trait SchoolFeePaymentTrait
{
    public static function bootSchoolFeePaymentTrait()
    {
        static::creating(function ($model) {
            $model->term_id = Term::active()->id;
            $model->session_id = Session::active()->id;
            $model->status = (request()->amount_paid == SchoolFee::find(request()->school_fee_id)->amount) ? StatusEnum::COMPLETED->value : StatusEnum::PART_PAYMENT->value ;
        });
    }
}


