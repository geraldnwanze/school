<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassroomRequest;
use App\Http\Requests\UpdateClassroomRequest;
use App\Models\Classroom;
use App\Models\SubClassroom;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::paginate(5);
        return view('classrooms.index', compact('classrooms'));
    }

    public function store(StoreClassroomRequest $request)
    {
        try {
            DB::beginTransaction();
            $class = Classroom::create(['name' => $request->validated('name')]);
            $sub_classes = explode(",", $request->validated('sub_class'));
            for ($i=0; $i < count($sub_classes); $i++) {
                SubClassroom::create([
                    'classroom_id' => $class->id,
                    'name' => $sub_classes[$i]
                ]);
            }
            DB::commit();
            toast('classroom created successfully', 'success');
            return to_route('classrooms.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            DB::beginTransaction();
            $classroom->update(['name' => $request->validated('name')]);
            $sub_classroom = SubClassroom::where('classroom_id', $classroom->id);
            $sub_classes = explode(",", $request->validated('sub_class'));

            if ($sub_classroom->exists()) {
                for ($i=0; $i < count($sub_classes); $i++) {
                    $sub_classroom->update(['name' => $sub_classes[$i]]);
                }
            } else {
                for ($i=0; $i < count($sub_classes); $i++) {
                    SubClassroom::create(['classroom_id' => $classroom->id, 'name' => $sub_classes[$i]]);
                }
            }

            DB::commit();
            toast('classroom updated successfully', 'success');
            return to_route('classrooms.index');
        } catch (\Throwable $th) {
            toast('something went wrong', 'error');
            return back();
        }
    }

}
