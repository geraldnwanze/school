<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherClassroomRequest;
use App\Http\Requests\UpdateTeacherClassroomRequest;
use App\Models\Classroom;
use App\Models\Teacher;
use App\Models\TeacherClassroom;

class TeacherClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_classrooms = TeacherClassroom::all();
        return view('teacher_classrooms.index', compact('teacher_classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('teacher_classrooms.create', compact('teachers', 'classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherClassroomRequest $request)
    {
        for ($i=0; $i < count($request->validated('classroom_id')); $i++) {
            TeacherClassroom::create([
                'teacher_id' => $request->validated('teacher_id'),
                'classroom_id' => $request->validated('classroom_id')[$i]
            ]);
        }
        toast('teacher assigned to classroom', 'success');
        return to_route('teacher-classrooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherClassroom $teacherClassroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherClassroom $teacherClassroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherClassroomRequest $request, TeacherClassroom $teacherClassroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherClassroom $teacherClassroom)
    {
        //
    }
}
