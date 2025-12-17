<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Address;
use App\Models\Staff;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $stores = Store::with(['manager', 'address.city.country'])
        ->when($search, function($q) use ($search) {
            $q->whereHas('manager', function($m) use ($search) {
                $m->where('first_name', 'LIKE', "%$search%")
                  ->orWhere('last_name', 'LIKE', "%$search%");
            })
            ->orWhereHas('address', function($a) use ($search) {
                $a->where('address', 'LIKE', "%$search%");
            });
        })
        ->paginate(20);

    return view('stores.index', compact('stores', 'search'));
}


    public function create()
    {
        // Datos necesarios para crear una tienda
        $addresses = Address::all();
        $staff = Staff::all();

        return view('stores.create', compact('addresses', 'staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id'       => 'required',
        ]);

        // Solo enviar los campos permitidos
        Store::create($request->only('manager_staff_id', 'address_id'));

        return redirect()->route('stores.index')
            ->with('success', 'Tienda creada correctamente.');
    }

    public function show($id)
    {
        $store = Store::with(['manager', 'address.city.country'])->findOrFail($id);

        return view('stores.show', compact('store'));
    }

    public function edit($id)
    {
        $store = Store::findOrFail($id);
        $addresses = Address::all();
        $staff = Staff::all();

        return view('stores.edit', compact('store', 'addresses', 'staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'manager_staff_id' => 'required',
            'address_id'       => 'required',
        ]);

        $store = Store::findOrFail($id);

        // Solo actualizar lo permitido
        $store->update($request->only('manager_staff_id', 'address_id'));

        return redirect()->route('stores.index')
            ->with('success', 'Tienda actualizada correctamente.');
    }

    public function destroy($id)
    {
        try {
            $store = Store::findOrFail($id);
            $store->delete();

            return redirect()->route('stores.index')
                ->with('success', 'Tienda eliminada.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('stores.index')
                ->with('error', 'No se puede eliminar esta tienda, tiene registros asociados.');
        }
    }
}

