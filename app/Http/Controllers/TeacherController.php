<?php

namespace App\Http\Controllers;

use App\Enums\MaritalStatusEnum;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        $marital_status = MaritalStatusEnum::cases();
        return view('teachers.create', compact('marital_status'));
    }

    public function store(StoreTeacherRequest $request)
    {
        $passport = $this->uploadImage('passport', 'passports/teachers');
        $values = [
            'name' => $request->validated('name'),
            'phone' => $request->validated('phone'),
            'address' => $request->validated('address'),
            'passport' => $passport,
            'marital_status' => $request->validated('marital_status'),
            'date_of_employment' => $request->validated('date_of_employment')
        ];

        Teacher::create($values);
        toast('teacher created', 'success');
        return to_route('teachers.index');
    }

    public function edit(Teacher $teacher)
    {
        $marital_status = MaritalStatusEnum::cases();
        return view('teachers.edit', compact('teacher', 'marital_status'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        if ($request->hasFile('passport')) {
            $passport = $this->uploadImage('passport', 'passports/teachers');
            $values = [
                'name' => $request->validated('name'),
                'phone' => $request->validated('phone'),
                'address' => $request->validated('address'),
                'passport' => $passport,
                'marital_status' => $request->validated('marital_status'),
                'date_of_employment' => $request->validated('date_of_employment')
            ];
        } else {
            $values = [
                'name' => $request->validated('name'),
                'phone' => $request->validated('phone'),
                'address' => $request->validated('address'),
                'marital_status' => $request->validated('marital_status'),
                'date_of_employment' => $request->validated('date_of_employment')
            ];
        }

        $teacher->update($values);
        toast('teacher updated', 'success');
        return to_route('teachers.index');
    }

}
