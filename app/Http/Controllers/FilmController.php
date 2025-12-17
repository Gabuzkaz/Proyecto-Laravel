<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Actor;
use App\Models\Category;
use App\Models\Language;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $films = Film::when($search, function ($query, $search) {
            return $query->where('title', 'LIKE', "%{$search}%");
        })
        ->orderBy('film_id', 'asc')
        ->paginate(10);

    return view('films.index', compact('films'));
}


    public function create()
    {
        $languages = Language::all();
        $actors = Actor::all();
        $categories = Category::all();

        return view('films.create', compact('languages', 'actors', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'release_year' => 'nullable|integer',
            'language_id' => 'required',
        ]);

        // Crear película
        $film = Film::create($request->only([
            'title',
            'description',
            'release_year',
            'language_id',
            'rental_duration',
            'rental_rate',
            'length',
            'replacement_cost',
            'rating'
        ]));

        // Relacionar actores y categorias
        if ($request->actors) {
            $film->actors()->sync($request->actors);
        }

        if ($request->categories) {
            $film->categories()->sync($request->categories);
        }

        return redirect()->route('films.index')->with('success', 'Película creada');
    }

    public function show(Film $film)
    {
        $film->load('language', 'actors', 'categories');
        return view('films.show', compact('film'));
    }

    public function edit(Film $film)
    {
        $languages = Language::all();
        $actors = Actor::all();
        $categories = Category::all();

        $film->load('actors', 'categories');

        return view('films.edit', compact('film', 'languages', 'actors', 'categories'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'title' => 'required',
            'release_year' => 'nullable|integer',
            'language_id' => 'required',
        ]);

        $film->update($request->only([
            'title',
            'description',
            'release_year',
            'language_id',
            'rental_duration',
            'rental_rate',
            'length',
            'replacement_cost',
            'rating'
        ]));

        if ($request->actors) {
            $film->actors()->sync($request->actors);
        }

        if ($request->categories) {
            $film->categories()->sync($request->categories);
        }

        return redirect()->route('films.index')->with('success', 'Película actualizada');
    }

   public function destroy($id)
{
    try {
        $film = Film::findOrFail($id);
        $film->delete();

        return redirect()
            ->route('films.index')
            ->with('success', 'Película eliminada correctamente.');
    } catch (\Illuminate\Database\QueryException $e) {

        return redirect()
            ->route('films.index')
            ->with('error', 'No se puede eliminar la película porque está siendo usada en otra tabla.');
    }
}

}