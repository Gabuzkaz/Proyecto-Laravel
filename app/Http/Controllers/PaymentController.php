<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
{
    $search = $request->input('search');

    $payments = Payment::with(['customer', 'staff'])
        ->when($search, function($query) use ($search) {
            $query->where('amount', 'LIKE', "%$search%")
                ->orWhereHas('customer', function($q) use ($search) {
                    $q->where('first_name', 'LIKE', "%$search%")
                      ->orWhere('last_name', 'LIKE', "%$search%");
                })
                ->orWhereHas('staff', function($q) use ($search) {
                    $q->where('first_name', 'LIKE', "%$search%")
                      ->orWhere('last_name', 'LIKE', "%$search%");
                });
        })
        ->paginate(20);

    return view('payments.index', compact('payments', 'search'));
}



    public function create()
    {
        $customers = Customer::all();
        $staffs = Staff::all();
        return view('payments.create', compact('customers', 'staffs'));
    }

    public function store(Request $request)
{
    $request->validate([
        'customer_id' => 'required',
        'staff_id'    => 'required',
        'amount'      => 'required|numeric'
    ]);

    Payment::create([
        'customer_id'  => $request->customer_id,
        'staff_id'     => $request->staff_id,
        'amount'       => $request->amount,
        'rental_id'    => $request->rental_id, // si quieres usarlo o dejar nulo
        'payment_date' => now(),               // 🔥 OBLIGATORIO
    ]);

    return redirect()->route('payments.index')
        ->with('success', 'Pago creado correctamente');
}


    public function show($id)
    {
        $payment = Payment::with(['customer', 'staff'])->findOrFail($id);
        return view('payments.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);
        $customers = Customer::all();
        $staffs = Staff::all();

        return view('payments.edit', compact('payment', 'customers', 'staffs'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'customer_id' => 'required',
        'staff_id'    => 'required',
        'amount'      => 'required|numeric'
    ]);

    $payment = Payment::findOrFail($id);

    $payment->update([
        'customer_id'  => $request->customer_id,
        'staff_id'     => $request->staff_id,
        'amount'       => $request->amount,
        'rental_id'    => $request->rental_id,
        'payment_date' => $payment->payment_date ?? now(), // 🔥 mantener valor existente
    ]);

    return redirect()->route('payments.index')
        ->with('success', 'Pago actualizado correctamente');
}


    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect()->route('payments.index')->with('success', 'Pago eliminado');
    }
}

