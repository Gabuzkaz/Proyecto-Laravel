@extends('layout')

@section('content')
<h2>Detalle del Alquiler</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $rental->rental_id }}</li>
    <li class="list-group-item"><strong>Cliente:</strong> {{ $rental->customer->first_name }} {{ $rental->customer->last_name }}</li>
    <li class="list-group-item"><strong>Pelicula:</strong> {{ $rental->inventory->film->title }}</li>
    <li class="list-group-item"><strong>Staff:</strong> {{ $rental->staff->first_name }}</li>
    <li class="list-group-item"><strong>Fecha Renta:</strong> {{ $rental->rental_date }}</li>
    <li class="list-group-item"><strong>Fecha Retorno:</strong> {{ $rental->return_date }}</li>
</ul>

<a href="{{ route('rentals.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
