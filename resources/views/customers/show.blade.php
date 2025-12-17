@extends('layout')

@section('content')
<h2>Detalles del Cliente</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $customer->customer_id }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $customer->first_name }}</li>
    <li class="list-group-item"><strong>Apellido:</strong> {{ $customer->last_name }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $customer->email }}</li>
</ul>

<a href="{{ route('customers.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
