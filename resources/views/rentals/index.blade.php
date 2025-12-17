@extends('layout')

@section('content')
<h2>Lista de Alquileres</h2>
<form method="GET" action="{{ route('rentals.index') }}" class="mb-3">
    <input type="text" name="search" class="form-control"
           placeholder="Buscar por cliente, película o staff..."
           value="{{ $search }}">
</form>

<a href="{{ route('rentals.create') }}" class="btn btn-primary mb-3">Nuevo Alquiler</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Pelicula</th>
            <th>Staff</th>
            <th>Fecha Renta</th>
            <th>Fecha Retorno</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rentals as $rent)
        <tr>
            <td>{{ $rent->rental_id }}</td>
            <td>{{ $rent->customer->first_name }} {{ $rent->customer->last_name }}</td>
            <td>{{ $rent->inventory->film->title }}</td>
            <td>{{ $rent->staff->first_name }}</td>
            <td>{{ $rent->rental_date }}</td>
            <td>{{ $rent->return_date }}</td>
            <td>
                <a href="{{ route('rentals.show', $rent) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('rentals.edit', $rent) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('rentals.destroy', $rent) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
