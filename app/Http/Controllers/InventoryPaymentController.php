<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryPaymentRequest;
use App\Http\Requests\UpdateInventoryPaymentRequest;
use App\Models\Inventory;
use App\Models\InventoryPayment;
use App\Models\Student;

class InventoryPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::all();
        $students = Student::all();
        $payments = InventoryPayment::paginate();
        return view('inventory_payments.index', compact('payments', 'students', 'inventories'));
    }

    public function store(StoreInventoryPaymentRequest $request)
    {
        InventoryPayment::create($request->validated());
        toast('purchase successful', 'success');
        return back();
    }

}
