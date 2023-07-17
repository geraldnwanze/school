<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Classroom;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate();
        return view('students.index', compact('students'));
    }

    public function store(StoreStudentRequest $request)
    {

    }

    public function activate(Student $student)
    {
        $student->update(['status' => StatusEnum::ACTIVE->value]);
        toast('student activated successfully', 'success');
        return back();
    }

    public function deactivate(Student $student)
    {
        $student->update(['status' => StatusEnum::INACTIVE->value]);
        toast('student deactivated successfully', 'success');
        return back();
    }
}
