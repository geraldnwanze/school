<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOffenceRequest;
use App\Http\Requests\UpdateOffenceRequest;
use App\Models\Offence;

class OffenceController extends Controller
{
    public function index()
    {
        $offences = Offence::paginate();
        return view('offences.index', compact('offences'));
    }

    public function store(StoreOffenceRequest $request)
    {
        Offence::firstOrCreate($request->validated());
        toast('offence created', 'success');
        return back();
    }

    public function update(UpdateOffenceRequest $request, Offence $offence)
    {
        $offence->update($request->validated());
        toast('offence updated', 'success');
        return back();
    }

}
