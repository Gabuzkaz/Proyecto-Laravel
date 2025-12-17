@extends('layout')

@section('content')
<h2>Lista de Empleados</h2>
<form method="GET" action="{{ route('staff.index') }}" class="mb-3">
    <input type="text" name="search" value="{{ $search }}" placeholder="Buscar empleado..."
           class="form-control" />
</form>

<a href="{{ route('staff.create') }}" class="btn btn-primary mb-3">Nuevo Empleado</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($staff as $s)
        <tr>
            <td>{{ $s->staff_id }}</td>
            <td>{{ $s->first_name }} {{ $s->last_name }}</td>
            <td>{{ $s->email }}</td>
            <td>
                <a href="{{ route('staff.show', $s->staff_id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('staff.edit', $s->staff_id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('staff.destroy', $s->staff_id) }}" method="POST" style="display:inline;">
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
