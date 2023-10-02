<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAccountRequest;
use App\Http\Requests\StoreOffencePaymentRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Models\Classroom;
use App\Models\Offence;
use App\Models\OffencePayment;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('account')->paginate();
        $classes = Classroom::all();
        $offences = Offence::all();
        return view('accounts.index', compact('students','classes', 'offences'));
    }

    public function credit(UpdateAccountRequest $request, Student $student)
    {
        $student->account->update(['balance' => ($student->account->balance + $request->validated('amount'))]);
        toast('account credited', 'success');
        return back();
    }

    public function debitForOffence(Student $student, StoreOffencePaymentRequest $request)
    {
        $offence = Offence::find($request->validated('offence_id'));
        if ($student->account->balance < $offence->penalty) {
            toast('insufficient funds', 'error');
            return back();
        }
        DB::beginTransaction();

        OffencePayment::firstOrCreate([
            'student_id' => $student->id,
            'offence_id' => $request->validated('offence_id')
        ]);
        $student->account->update(['balance' => ($student->account->balance - $offence->penalty)]);

        DB::commit();
        toast('account debited for offence', 'success');
        return back();
    }

}
