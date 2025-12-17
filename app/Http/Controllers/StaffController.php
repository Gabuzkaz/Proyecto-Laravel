<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $staff = Staff::when($search, function($query) use ($search) {
        $query->where('first_name', 'like', "%$search%")
              ->orWhere('last_name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
    })->get();

    return view('staff.index', compact('staff', 'search'));
}


    public function create()
    {
        return view('staff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'nullable|email'
        ]);

        // 🚀 Crear staff con valores automáticos
        Staff::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'address_id' => 1, // valor por defecto
            'store_id'   => 1, // valor por defecto
            'username'   => strtolower($request->first_name) // valor auto
        ]);

        return redirect()->route('staff.index')
            ->with('success', 'Empleado creado correctamente');
    }

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.show', compact('staff'));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'nullable|email'
        ]);

        $staff = Staff::findOrFail($id);

        // Actualiza solo los campos que editas
        $staff->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email
        ]);

        return redirect()->route('staff.index')
            ->with('success', 'Empleado actualizado correctamente');
    }

    public function destroy($id)
    {
        try {
            Staff::destroy($id);

            return redirect()->route('staff.index')
                ->with('success', 'Empleado eliminado correctamente');

        } catch (\Illuminate\Database\QueryException $e) {

            return redirect()->route('staff.index')
                ->with('error', 'No se puede eliminar este empleado porque tiene registros asociados.');
        }
    }
}

