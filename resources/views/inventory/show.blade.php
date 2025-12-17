@extends('layout')

@section('content')
<h2>Detalle de Inventario</h2>

<p><strong>ID:</strong> {{ $item->inventory_id }}</p>
<p><strong>Pelicula:</strong> {{ $item->film->title }}</p>
<p><strong>Tienda:</strong> {{ $item->store->store_id }}</p>

<a href="{{ route('inventory.index') }}" class="btn btn-secondary">Volver</a>
@endsection
