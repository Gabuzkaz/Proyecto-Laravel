<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function index()
{
    $stats = [
        'total_films'    => DB::table('film')->count(),
        'total_actors'   => DB::table('actor')->count(),
        'total_customers'=> DB::table('customer')->count(),
        'rentals_active' => DB::table('rental')->whereNull('return_date')->count(),
    ];

    return view('dashboard', compact('stats'));
}

}
