<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Staff;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $rentals = Rental::with(['customer', 'inventory.film', 'staff'])
        ->when($search, function ($query) use ($search) {
            $query->whereHas('customer', function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%$search%")
                  ->orWhere('last_name', 'LIKE', "%$search%");
            })
            ->orWhereHas('inventory.film', function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%");
            })
            ->orWhereHas('staff', function ($q) use ($search) {
                $q->where('first_name', 'LIKE', "%$search%");
            });
        })
        ->paginate(20);

    return view('rentals.index', compact('rentals', 'search'));
}



    public function create()
    {
        $customers = Customer::all();
        $inventory = Inventory::with('film')->get();
        $staff = Staff::all();

        return view('rentals.create', compact('customers', 'inventory', 'staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'inventory_id' => 'required',
            'staff_id' => 'required',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        Rental::create($request->all());

        return redirect()->route('rentals.index')->with('success', 'Alquiler creado');
    }

    public function show(Rental $rental)
    {
        $rental->load(['customer', 'inventory.film', 'staff']);
        return view('rentals.show', compact('rental'));
    }

    public function edit(Rental $rental)
    {
        $customers = Customer::all();
        $inventory = Inventory::with('film')->get();
        $staff = Staff::all();

        return view('rentals.edit', compact('rental', 'customers', 'inventory', 'staff'));
    }

    public function update(Request $request, Rental $rental)
    {
        $request->validate([
            'customer_id' => 'required',
            'inventory_id' => 'required',
            'staff_id' => 'required',
            'rental_date' => 'required|date',
            'return_date' => 'nullable|date',
        ]);

        $rental->update($request->all());

        return redirect()->route('rentals.index')->with('success', 'Alquiler actualizado');
    }

    public function destroy(Rental $rental)
    {
        $rental->delete();
        return redirect()->route('rentals.index')->with('success', 'Alquiler eliminado');
    }
}
