<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolFeeRequest;
use App\Http\Requests\UpdateSchoolFeeRequest;
use App\Models\Classroom;
use App\Models\SchoolFee;
use App\Models\SchoolFeeAttribute;
use App\Models\Session;
use App\Models\Term;
use Illuminate\Http\Request;

class SchoolFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sessions = Session::all();
        $terms = Term::all();
        $classes = Classroom::all();
        $attributes = SchoolFeeAttribute::all();
        $fees = $this->filter() ?? [];
        // dd($fees);
        return view('school_fees.index', compact('fees', 'classes', 'attributes', 'sessions', 'terms'));
    }

    public function store(StoreSchoolFeeRequest $request)
    {
        if (SchoolFee::where([
            'classroom_id' => $request->validated('classroom_id'),
            'school_fee_attribute_id' => $request->validated('school_fee_attribute_id'),
            'session_id' => $request->validated('session_id'),
            'term_id' => $request->validated('term_id')
            ])->exists()) {
                toast('records already exists', 'warning');
                return back();
            }
        SchoolFee::create($request->validated());
        toast('school fee saved successfully', 'success');
        return back();
    }

    public function update(UpdateSchoolFeeRequest $request, SchoolFee $schoolFee)
    {
        $schoolFee->update($request->validated());
        toast('school fee updated', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function searchByClass()
    {
        $id = request()->get('class_id');
        return SchoolFee::with('attribute')->where('classroom_id', $id)->get();
    }

    public function filter()
    {
        $filter = request()->get('filter');
        $data = request()->get('data');

        switch ($filter) {
            case 'session':
                return SchoolFee::with('attribute', 'classroom')->where('session_id', $data)->get();
                break;

            case 'term':
                return SchoolFee::with('attribute', 'classroom')->where('term_id', $data)->get();
                break;

            case 'class':
                return SchoolFee::with('attribute', 'classroom')->where('classroom_id', $data)->get();
                break;

            case 'attribute':
                return SchoolFee::with('attribute', 'classroom')->where('school_fee_attribute_id', $data)->get();
                break;

        }
    }

    public function fetchFilterData()
    {
        $filter = request()->get('filter');

        switch ($filter) {
            case 'session':
                return Session::all();
                break;

            case 'term':
                return Term::all();
                break;

            case 'class':
                return Classroom::all();
                break;

            case 'attribute':
                return SchoolFeeAttribute::all();
                break;
        }
    }
}
