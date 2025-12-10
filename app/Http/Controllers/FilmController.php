<?php

namespace App\Http\Controllers;

use App\Models\Film;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::with(['actors', 'categories', 'language'])
            ->limit(50)
            ->get();

        return response()->json($films);
    }

    public function show($id)
    {
        $film = Film::with(['actors', 'categories', 'language'])
            ->where('film_id', $id)
            ->firstOrFail();

        return response()->json($film);
    }
}

