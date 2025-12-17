@extends('layout')

@section('content')
<h2>Detalles de la Tienda</h2>

<p><strong>ID:</strong> {{ $store->store_id }}</p>
<p><strong>Manager:</strong> {{ $store->manager->first_name }} {{ $store->manager->last_name }}</p>
<p><strong>Dirección:</strong> {{ $store->address->address }}</p>

<a href="{{ route('stores.index') }}" class="btn btn-secondary">Volver</a>
@endsection
