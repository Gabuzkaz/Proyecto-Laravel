<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $languages = Language::where('name', 'LIKE', "%$search%")
        ->orderBy('language_id', 'asc')
        ->paginate(20);

    return view('languages.index', compact('languages', 'search'));
}


    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Language::create([
            'name' => $request->name
        ]);

        return redirect()->route('languages.index')->with('success', 'Idioma creado');
    }

    public function show(Language $language)
    {
        return view('languages.show', compact('language'));
    }

    public function edit(Language $language)
    {
        return view('languages.edit', compact('language'));
    }

    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $language->update([
            'name' => $request->name
        ]);

        return redirect()->route('languages.index')->with('success', 'Idioma actualizado');
    }

    public function destroy(Language $language)
    {
        $language->delete();
        return redirect()->route('languages.index')->with('success', 'Idioma eliminado');
    }
}

