@extends('layout')

@section('content')
<h2>Agregar Registro de Inventario</h2>

<form method="POST" action="{{ route('inventory.store') }}">
    @csrf

    <label>Pelicula</label>
    <select name="film_id" class="form-control" required>
        @foreach ($films as $film)
            <option value="{{ $film->film_id }}">{{ $film->title }}</option>
        @endforeach
    </select>

    <label class="mt-3">Tienda</label>
    <select name="store_id" class="form-control" required>
        @foreach ($stores as $store)
            <option value="{{ $store->store_id }}">Tienda {{ $store->store_id }}</option>
        @endforeach
    </select>

    <button class="btn btn-success mt-3">Guardar</button>
</form>
@endsection
