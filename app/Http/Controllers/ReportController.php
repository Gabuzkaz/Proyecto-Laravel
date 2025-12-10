<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    // 1. TOP 10 CLIENTES QUE MÁS HAN PAGADO
    public function topCustomers()
    {
        $data = DB::table('payment')
            ->join('customer', 'payment.customer_id', '=', 'customer.customer_id')
            ->select(
                'customer.customer_id',
                DB::raw("CONCAT(customer.first_name, ' ', customer.last_name) AS name"),
                DB::raw('SUM(payment.amount) AS total_paid')
            )
            ->groupBy('customer.customer_id')
            ->orderByDesc('total_paid')
            ->limit(10)
            ->get();

        return response()->json($data);
    }

    // 2. TOP PELÍCULAS MÁS ALQUILADAS
    public function topFilms()
    {
        $data = DB::table('rental')
            ->join('inventory', 'rental.inventory_id', '=', 'inventory.inventory_id')
            ->join('film', 'inventory.film_id', '=', 'film.film_id')
            ->select('film.film_id', 'film.title', DB::raw('COUNT(*) AS rentals'))
            ->groupBy('film.film_id')
            ->orderByDesc('rentals')
            ->limit(10)
            ->get();

        return response()->json($data);
    }

    // 3. CANTIDAD DE RENTAS POR TIENDA
    public function rentalsPerStore()
    {
        $data = DB::table('rental')
            ->join('inventory', 'rental.inventory_id', '=', 'inventory.inventory_id')
            ->join('store', 'inventory.store_id', '=', 'store.store_id')
            ->select('store.store_id', DB::raw('COUNT(*) AS rentals'))
            ->groupBy('store.store_id')
            ->get();

        return response()->json($data);
    }
}
