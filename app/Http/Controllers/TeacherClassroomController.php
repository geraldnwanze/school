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
        $teachers = Teacher::with('classrooms')->paginate();
        $classes = Classroom::all();
        return view('teacher_classrooms.index', compact('classes', 'teachers'));
    }

    public function store(StoreTeacherClassroomRequest $request)
    {
        for ($i=0; $i < count($request->validated('classroom_id')); $i++) {
            TeacherClassroom::create([
                'teacher_id' => $request->validated('teacher_id'),
                'classroom_id' => $request->validated('classroom_id')[$i]
            ]);
        }
        toast('teacher assigned to classroom', 'success');
        return back();
    }

    public function update(UpdateTeacherClassroomRequest $request, Teacher $teacher)
    {
        if (!$request->validated('classroom_id')) {
            toast('select a class', 'error');
            return back();
        }

        TeacherClassroom::where('teacher_id', $teacher->id)->delete();
        for ($i=0; $i < count($request->validated('classroom_id')); $i++) {
            TeacherClassroom::create([
                'teacher_id' => $request->validated('teacher_id'),
                'classroom_id' => $request->validated('classroom_id')[$i]
            ]);
        }

        toast('teacher subjects updated', 'success');
        return back();
    }

}
