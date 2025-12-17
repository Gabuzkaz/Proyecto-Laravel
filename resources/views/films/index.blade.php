@extends('layout')

@section('content')
<h2>Listado de Películas</h2>
{{-- Barra de búsqueda --}}
<form method="GET" action="{{ route('films.index') }}" class="mb-3 d-flex" role="search">
    <input type="text" name="search" class="form-control me-2"
           placeholder="Buscar película..."
           value="{{ request('search') }}">
    <button class="btn btn-secondary">Buscar</button>
</form>

<a href="{{ route('films.create') }}" class="btn btn-primary mb-3">Nueva Película</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Año</th>
            <th>Opciones</th>
        </tr>
    </thead>

    <tbody>
    @foreach($films as $film)
        <tr>
            <td>{{ $film->film_id }}</td>
            <td>{{ $film->title }}</td>
            <td>{{ $film->release_year }}</td>
            <td>
                <a href="{{ route('films.show', $film) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('films.edit', $film) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('films.destroy', $film) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $films->links() }}
@endsection

