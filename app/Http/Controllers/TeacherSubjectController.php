<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherSubjectRequest;
use App\Http\Requests\UpdateTeacherSubjectRequest;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;

class TeacherSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teacher_subjects = TeacherSubject::all();
        return view('teacher_subjects.index', compact('teacher_subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('teacher_subjects.create', compact('teachers', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherSubjectRequest $request)
    {
        $teacher_subject = TeacherSubject::find($request->validated('teacher_id'));
        for ($i=0; $i < count($request->validated('subject_id')); $i++) {
            if ($request->validated('subject_id')[$i] != $teacher_subject->subject_id) {
                TeacherSubject::create([
                    'teacher_id' => $request->validated('teacher_id'),
                    'subject_id' => $request->validated('subject_id')[$i]
                ]);
            }
        }
        toast('teacher assigned to subjects', 'success');
        return to_route('teacher-subjects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherSubjectRequest $request, TeacherSubject $teacherSubject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeacherSubject $teacherSubject)
    {
        //
    }
}
