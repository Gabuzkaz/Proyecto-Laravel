@extends('layout')

@section('content')
<h2>Editar Inventario</h2>

<form method="POST" action="{{ route('inventory.update', $item->inventory_id) }}">
    @csrf
    @method('PUT')

    <label>Pelicula</label>
    <select name="film_id" class="form-control">
        @foreach ($films as $film)
            <option value="{{ $film->film_id }}"
                {{ $film->film_id == $item->film_id ? 'selected' : '' }}>
                {{ $film->title }}
            </option>
        @endforeach
    </select>

    <label class="mt-3">Tienda</label>
    <select name="store_id" class="form-control">
        @foreach ($stores as $store)
            <option value="{{ $store->store_id }}"
                {{ $store->store_id == $item->store_id ? 'selected' : '' }}>
                Tienda {{ $store->store_id }}
            </option>
        @endforeach
    </select>

    <button class="btn btn-success mt-3">Actualizar</button>
</form>
@endsection
