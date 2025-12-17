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
            ->groupBy('customer.customer_id', 'customer.first_name', 'customer.last_name')
            ->orderByDesc('total_paid')
            ->limit(10)
            ->get();

        return view('reports.top-customers', compact('data'));
    }

    // 2. TOP PELÍCULAS MÁS ALQUILADAS
    public function topFilms()
    {
        $data = DB::table('rental')
            ->join('inventory', 'rental.inventory_id', '=', 'inventory.inventory_id')
            ->join('film', 'inventory.film_id', '=', 'film.film_id')
            ->select(
                'film.film_id',
                'film.title',
                DB::raw('COUNT(*) AS rentals')
            )
            ->groupBy('film.film_id', 'film.title')
            ->orderByDesc('rentals')
            ->limit(10)
            ->get();

        return view('reports.top-films', ['data' => $data]);
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

        return view('reports.rentals-per-store', ['data' => $data]);
    }

    // 4. PELÍCULAS EXCLUSIVAS POR TIENDA
    public function exclusiveFilms($store_id)
{
    // Primero identificamos las películas que solo existen en 1 tienda
    $exclusive = DB::table('inventory')
        ->select('film_id')
        ->groupBy('film_id')
        ->havingRaw('COUNT(DISTINCT store_id) = 1')   // << AQUI EL FIX
        ->pluck('film_id');

    // Ahora filtramos las que pertenecen a la tienda específica
    $films = DB::table('inventory')
        ->join('film', 'inventory.film_id', '=', 'film.film_id')
        ->where('inventory.store_id', $store_id)
        ->whereIn('film.film_id', $exclusive)
        ->select('film.film_id', 'film.title')
        ->get();

    return view('reports.exclusive-films', [
        'data' => $films,
        'store_id' => $store_id
    ]);
}

}
