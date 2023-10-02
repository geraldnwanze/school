<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\OffencePayment;
use App\Models\Student;

class OffencePaymentController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        $students = Student::paginate();
        $payments = OffencePayment::with('student','offence')->paginate();
        return view('offence_payments.index', compact('students', 'classes'));
    }
}
