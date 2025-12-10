@extends('layout')

@section('content')
<h1>Cliente #{{ $customer->customer_id }}</h1>

<p><strong>Nombre:</strong> {{ $customer->first_name }} {{ $customer->last_name }}</p>
<p><strong>Email:</strong> {{ $customer->email }}</p>

<h3>Rentas:</h3>
<ul>
@foreach($customer->rentals as $r)
    <li>
        {{ $r->inventory->film->title }} —
        {{ $r->rental_date }}
    </li>
@endforeach
</ul>

<h3>Pagos:</h3>
<ul>
@foreach($customer->payments as $p)
    <li>${{ $p->amount }} — {{ $p->payment_date }}</li>
@endforeach
</ul>
@endsection

