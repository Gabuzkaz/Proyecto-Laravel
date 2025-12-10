<?php

namespace App\Http\Controllers;

use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::with(['address', 'rentals', 'payments'])
            ->limit(50)
            ->get();

        return response()->json($customers);
    }

    public function show($id)
    {
        $customer = Customer::with(['address', 'rentals.inventory.film', 'payments'])
            ->where('customer_id', $id)
            ->firstOrFail();

        return response()->json($customer);
    }
}
