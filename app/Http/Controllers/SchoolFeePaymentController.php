<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use App\Http\Requests\StoreSchoolFeePaymentRequest;
use App\Http\Requests\UpdateSchoolFeePaymentRequest;
use App\Models\Classroom;
use App\Models\SchoolFee;
use App\Models\SchoolFeePayment;
use App\Models\SchoolFeePaymentHistory;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;

class SchoolFeePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schoolFees = SchoolFee::all();
        $students = StudentProfile::all();
        $classrooms = Classroom::all();
        $schoolFeesPayments = SchoolFeePayment::with('student')->paginate();
        return view('school_fees_payments.index', compact('schoolFees', 'schoolFeesPayments', 'classrooms', 'students'));
    }

    public function store(StoreSchoolFeePaymentRequest $request)
    {
        DB::beginTransaction();
        $payment = SchoolFeePayment::create($request->validated());
        SchoolFeePaymentHistory::create([
            'school_fee_payment_id' => $payment->id,
            'amount_paid' => $request->validated('amount_paid')
        ]);
        DB::commit();
        toast('new payment created', 'success');
        return back();
    }

    public function update(UpdateSchoolFeePaymentRequest $request, SchoolFeePayment $payment)
    {
        $schoolFee = SchoolFee::find($payment->school_fee_id);
        if (($payment->amount_paid + $request->amount_paid) > $schoolFee->amount) {
            toast('you cannot pay more than your school fees', 'error');
            return back();
        }

        DB::beginTransaction();

        SchoolFeePaymentHistory::create([
            'school_fee_payment_id' => $payment->id,
            'amount_paid' => $request->validated('amount_paid')
        ]);
        $payment->update([
            'amount_paid' => ($request->amount_paid + $payment->amount_paid),
            'status' => (($request->amount_paid + $payment->amount_paid) == $schoolFee->amount) ? StatusEnum::COMPLETED->value : StatusEnum::PART_PAYMENT->value
        ]);

        DB::commit();
        toast('payment updated', 'success');
        return back();
    }

    public function print(SchoolFeePayment $payment)
    {
        return view('school_fees_payments.print', compact('payment'));
    }

    public function show(SchoolFeePayment $payment)
    {
        $histories = SchoolFeePaymentHistory::where('school_fee_payment_id', $payment->id)->paginate();
        return view('school_fees_payments.history', compact('histories'));
    }

}
