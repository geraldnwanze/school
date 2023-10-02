<?php

namespace App\Http\Controllers;

use App\Enums\GenderEnum;
use App\Http\Requests\StoreStudentProfileRequest;
use App\Http\Requests\UpdateStudentProfileRequest;
use App\Models\Account;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\StudentProfile;
use Illuminate\Support\Facades\DB;

class StudentProfileController extends Controller
{

    public function show(Student $student)
    {
        return view('students_profile.show', compact('student'));
    }


    public function store(StoreStudentProfileRequest $request)
    {
        try {
            DB::beginTransaction();

            $student = Student::create([
                'password' => 123
            ]);
            $data = $request->validated();
            $data['student_id'] = $student->id;
            StudentProfile::create($data);
            Account::create(['student_id' => $student->id]);
            DB::commit();

            toast('student created successfully', 'success');
            return to_route('students.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    public function edit(Student $student)
    {
        $genders = GenderEnum::cases();
        $classrooms = Classroom::all();
        return view('students_profile.edit', compact('student', 'genders', 'classrooms'));
    }

    public function update(UpdateStudentProfileRequest $request, StudentProfile $studentProfile)
    {

        try {
            $studentProfile->update($request->validated());
            toast('student profile updated successfully', 'success');
            return to_route('students.profile.show', $studentProfile->student_id);
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    public function searchByClass()
    {
        $id = request()->get('class_id');
        return StudentProfile::where('classroom_id', $id)->get();
    }

}
