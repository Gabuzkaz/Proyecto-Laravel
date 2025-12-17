@extends('layout')

@section('content')
<h2>Categorías</h2>

<a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Nueva Categoría</a>

{{-- 🔍 Barra de Búsqueda --}}
<form action="{{ route('categories.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control"
               placeholder="Buscar categoría..."
               value="{{ $search }}">
        <button class="btn btn-dark" type="submit">Buscar</button>
    </div>
</form>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $cat)
        <tr>
            <td>{{ $cat->category_id }}</td>
            <td>{{ $cat->name }}</td>
            <td>
                <a href="{{ route('categories.show', $cat->category_id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('categories.edit', $cat->category_id) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('categories.destroy', $cat->category_id) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm"
                        onclick="return confirm('¿Eliminar categoría?')">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>

{{-- Paginación --}}
{{ $categories->links() }}
@endsection
