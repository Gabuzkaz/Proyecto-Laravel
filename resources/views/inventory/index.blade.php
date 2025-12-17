@extends('layout')

@section('content')
<h2>Inventario</h2>

<a href="{{ route('inventory.create') }}" class="btn btn-primary mb-3">Nuevo Registro</a>
<form method="GET" action="{{ route('inventory.index') }}" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" value="{{ $search ?? '' }}" 
               class="form-control" placeholder="Buscar por película...">
        <button class="btn btn-primary">Buscar</button>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Pelicula</th>
            <th>Tienda</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventory as $item)
        <tr>
            <td>{{ $item->inventory_id }}</td>
            <td>{{ $item->film->title }}</td>
            <td>{{ $item->store->store_id }}</td>
            <td>
                <a href="{{ route('inventory.show', $item->inventory_id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('inventory.edit', $item->inventory_id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('inventory.destroy', $item->inventory_id) }}"
                      method="POST" style="display:inline-block">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                            onclick="return confirm('¿Eliminar?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
