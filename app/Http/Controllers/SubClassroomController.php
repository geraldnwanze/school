<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubClassroomRequest;
use App\Http\Requests\UpdateSubClassroomRequest;
use App\Models\Classroom;
use App\Models\SubClassroom;

class SubClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sub_classrooms = SubClassroom::with('classroom')->get();
        return view('sub_classrooms.index', compact('sub_classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classrooms = Classroom::all();
        return view('sub_classrooms.create', compact('classrooms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubClassroomRequest $request)
    {
        SubClassroom::create($request->validated());
        toast('sub classroom created', 'success');
        return to_route('sub-classrooms.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubClassroom $subClassroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubClassroom $subClassroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubClassroomRequest $request, SubClassroom $subClassroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubClassroom $subClassroom)
    {
        //
    }
}
