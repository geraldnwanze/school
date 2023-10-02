<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInventoryRequest;
use App\Http\Requests\UpdateInventoryRequest;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::paginate();
        return view('inventory.index', compact('inventory'));
    }

    public function store(StoreInventoryRequest $request)
    {
        Inventory::create($request->validated());
        toast('new item created', 'success');
        return back();
    }

    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $inventory->update($request->validated());
        toast('item updated', 'success');
        return back();
    }
}
