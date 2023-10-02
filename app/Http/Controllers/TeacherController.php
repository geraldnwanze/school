<?php

namespace App\Http\Controllers;

use App\Enums\MaritalStatusEnum;
use App\Enums\OtherEnum;
use App\Enums\RoleEnum;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate();
        $maritalStatus = MaritalStatusEnum::cases();
        return view('teachers.index', compact('teachers', 'maritalStatus'));
    }

    public function store(StoreTeacherRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'role' => RoleEnum::TEACHER->value,
                'login_id' => Str::random(8),
                'password' => OtherEnum::DEFAULT_PASSWORD->value
            ]);
            $passport = $this->uploadImage('passport', 'passports/teachers');
            $values = [
                'user_id' => $user->id,
                'name' => $request->validated('name'),
                'phone' => $request->validated('phone'),
                'address' => $request->validated('address'),
                'passport' => $passport,
                'marital_status' => $request->validated('marital_status'),
                'date_of_employment' => $request->validated('date_of_employment')
            ];

            Teacher::create($values);
            DB::commit();

            toast('teacher created', 'success');
            return to_route('teachers.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        if ($request->hasFile('passport')) {
            $passport = $this->uploadImage('passport', 'passports/teachers');
            $this->deleteImage($teacher->passport);
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
