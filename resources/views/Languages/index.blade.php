@extends('layout')

@section('content')
<h2>Idiomas</h2>

<a href="{{ route('languages.create') }}" class="btn btn-primary mb-3">Nuevo Idioma</a>

<form method="GET" action="{{ route('languages.index') }}" class="mb-3 d-flex" style="max-width: 400px;">
    <input
        type="text"
        name="search"
        class="form-control me-2"
        placeholder="Buscar idioma..."
        value="{{ request('search') }}"
    >
    <button class="btn btn-secondary">Buscar</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Idioma</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($languages as $lang)
        <tr>
            <td>{{ $lang->language_id }}</td>
            <td>{{ $lang->name }}</td>
            <td>
                <a href="{{ route('languages.show', $lang) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('languages.edit', $lang) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('languages.destroy', $lang) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $languages->links() }}

@endsection
