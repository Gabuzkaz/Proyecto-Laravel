<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    // 🔹 LISTA DE ACTORES
   public function index(Request $request)
{
    $search = $request->input('search');

    $actors = Actor::when($search, function($query, $search) {
            return $query->where('first_name', 'LIKE', "%$search%")
                         ->orWhere('last_name', 'LIKE', "%$search%");
        })
        ->paginate(20)
        ->appends(['search' => $search]);

    return view('actors.index', compact('actors', 'search'));
}


    // 🔹 FORMULARIO DE CREACIÓN
    public function create()
    {
        return view('actors.create');
    }

    // 🔹 GUARDAR NUEVO ACTOR
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
        ]);

        Actor::create($request->all());

        return redirect()->route('actors.index')
            ->with('success', 'Actor creado correctamente');
    }

    // 🔹 MOSTRAR UN ACTOR
    public function show($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actors.show', compact('actor'));
    }

    // 🔹 FORMULARIO DE EDICIÓN
    public function edit($id)
    {
        $actor = Actor::findOrFail($id);
        return view('actors.edit', compact('actor'));
    }

    // 🔹 ACTUALIZAR ACTOR
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
        ]);

        $actor = Actor::findOrFail($id);
        $actor->update($request->all());

        return redirect()->route('actors.index')
            ->with('success', 'Actor actualizado correctamente');
    }

    public function destroy($id)
   {
    try {
        // ❗ Intentar eliminar
        Actor::destroy($id);

        return redirect()->back()->with('success', 'Eliminado correctamente');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'No se puede eliminar porque está en uso');
    }
    }

}
