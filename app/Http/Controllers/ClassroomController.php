<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClassroomRequest $request)
    {
        try {
            Classroom::create($request->validated());
            toast('classroom created successfully', 'success');
            return to_route('classrooms.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            $classroom->update($request->validated());
            toast('classroom updated successfully', 'success');
            return to_route('classrooms.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            toast('classroom deleted successfully', 'success');
            return back();
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }
}
