<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $customers = Customer::where('first_name', 'like', "%{$search}%")
        ->orWhere('last_name', 'like', "%{$search}%")
        ->orWhere('email', 'like', "%{$search}%")
        ->paginate(20);

    return view('customers.index', compact('customers', 'search'));
}


    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
        ]);

        Customer::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'email'       => $request->email,
            'store_id'    => 1,
            'address_id'  => 1,
            'create_date' => now(),   // 🔥 NECESARIO POR SAKILA
        ]);

        return redirect()->route('customers.index')
            ->with('success', 'Cliente creado correctamente');
    }

    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
        ]);

        $customer->update($request->only([
            'first_name',
            'last_name',
            'email'
        ]));

        return redirect()->route('customers.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
{
    try {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Customer eliminado correctamente.');
    
    } catch (\Exception $e) {
        return redirect()->route('customers.index')
            ->with('error', 'No se puede eliminar este customer porque tiene registros asociados.');
    }
}

}
