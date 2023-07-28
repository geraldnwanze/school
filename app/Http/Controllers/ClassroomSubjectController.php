<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomSubjectRequest;
use App\Http\Requests\UpdateClassroomSubjectRequest;
use App\Models\Classroom;
use App\Models\ClassroomSubject;
use App\Models\Subject;

class ClassroomSubjectController extends Controller
{
    public function index()
    {
        $classroom_subjects = ClassroomSubject::all();
        return view('classroom_subjects.index', compact('classroom_subjects'));
    }

    public function create()
    {
        $classrooms = Classroom::all();
        $subjects = Subject::all();
        return view('classroom_subjects.create', compact('classrooms','subjects'));
    }

    public function store(StoreClassroomSubjectRequest $request)
    {
        for ($i=0; $i < count($request->validated('subject_id')); $i++) {
            ClassroomSubject::create([
                'classroom_id' => $request->validated('classroom_id'),
                'subject_id' => $request->validated('subject_id')[$i]
            ]);
        }
        toast('subjects added to classroom', 'success');
        return to_route('classroom-subjects.index');
    }

}
