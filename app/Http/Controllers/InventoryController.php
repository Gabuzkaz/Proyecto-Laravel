<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Film;
use App\Models\Store;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    // 🔹 LISTA INVENTARIO
    public function index(Request $request)
{
    $search = $request->input('search');

    $inventory = Inventory::with(['film', 'store'])
        ->when($search, function ($query, $search) {
            $query->whereHas('film', function ($q) use ($search) {
                $q->where('title', 'LIKE', "%$search%");
            });
        })
        ->limit(50)
        ->get();

    return view('inventory.index', compact('inventory', 'search'));
}


    // 🔹 MOSTRAR FORMULARIO DE CREACIÓN
    public function create()
    {
        $films  = Film::all();
        $stores = Store::all();

        return view('inventory.create', compact('films', 'stores'));
    }

    // 🔹 GUARDAR NUEVO INVENTARIO
    public function store(Request $request)
    {
        $request->validate([
            'film_id'  => 'required',
            'store_id' => 'required'
        ]);

        Inventory::create([
            'film_id'  => $request->film_id,
            'store_id' => $request->store_id,
            'last_update' => now()
        ]);

        return redirect()->route('inventory.index')
            ->with('success', 'Inventario creado correctamente');
    }
}
