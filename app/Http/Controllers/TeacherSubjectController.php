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
        $teachers = Teacher::with('subjects')->paginate();
        $subjects = Subject::all();
        $teacher_subjects = TeacherSubject::paginate();
        return view('teacher_subjects.index', compact('teacher_subjects', 'teachers', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherSubjectRequest $request)
    {
        $teacher_subject = TeacherSubject::where('teacher_id', $request->validated('teacher_id'))->get();
        for ($i=0; $i < count($request->validated('subject_id')); $i++) {
            if (!$teacher_subject->isEmpty()) {
                if ($request->validated('subject_id')[$i] != $teacher_subject[$i]->subject_id) {
                    TeacherSubject::create([
                        'teacher_id' => $request->validated('teacher_id'),
                        'subject_id' => $request->validated('subject_id')[$i]
                    ]);
                }
            } else {
                TeacherSubject::create([
                    'teacher_id' => $request->validated('teacher_id'),
                    'subject_id' => $request->validated('subject_id')[$i]
                ]);
            }
        }
        toast('teacher assigned to subjects', 'success');
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherSubjectRequest $request, Teacher $teacher)
    {
        if (!$request->validated('subject_id')) {
            toast('select a subject', 'error');
            return back();
        }
        TeacherSubject::where('teacher_id', $teacher->id)->delete();
        for ($i=0; $i < count($request->validated('subject_id')); $i++) {
            TeacherSubject::create([
                'teacher_id' => $request->validated('teacher_id'),
                'subject_id' => $request->validated('subject_id')[$i]
            ]);
        }

        toast('teacher subjects updated', 'success');
        return back();
    }

}
