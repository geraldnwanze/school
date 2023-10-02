<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Enums\StatusEnum;
use App\Models\Classroom;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate();
        $classes = Classroom::all();
        $genders = GenderEnum::cases();
        return view('students.index', compact('students', 'classes', 'genders'));
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
