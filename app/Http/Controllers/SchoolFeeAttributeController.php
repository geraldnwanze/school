<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolFeeAttributeRequest;
use App\Http\Requests\UpdateSchoolFeeAttributeRequest;
use App\Models\SchoolFeeAttribute;

class SchoolFeeAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attributes = SchoolFeeAttribute::all();
        return view('school_fees.attributes', compact('attributes'));
    }


    public function store(StoreSchoolFeeAttributeRequest $request)
    {
        SchoolFeeAttribute::create($request->validated());
        toast('attribute created', 'success');
        return back();
    }

    public function update(UpdateSchoolFeeAttributeRequest $request, SchoolFeeAttribute $schoolFeeAttribute)
    {
        //
    }


    public function destroy(SchoolFeeAttribute $schoolFeeAttribute)
    {
        //
    }
}
