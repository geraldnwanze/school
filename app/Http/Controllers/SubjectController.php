<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        try {
            Subject::create($request->validated());
            toast('subject created', 'success');
            return to_route('subjects.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        try {
            $subject->update($request->validated());
            toast('subject updated', 'success');
            return to_route('subjects.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }
}
