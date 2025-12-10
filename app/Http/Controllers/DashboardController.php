<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'total_customers' => DB::table('customer')->count(),
            'total_films'     => DB::table('film')->count(),
            'total_rentals'   => DB::table('rental')->count(),
            'total_payments'  => DB::table('payment')->count(),
        ]);
    }
}
