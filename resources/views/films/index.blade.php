@extends('layout')

@section('content')
<h1 class="mb-4">Películas</h1>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Categorías</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
        @foreach($films as $film)
        <tr>
            <td>{{ $film->film_id }}</td>
            <td>{{ $film->title }}</td>
            <td>
                @foreach($film->categories as $cat)
                    <span class="badge bg-primary">{{ $cat->name }}</span>
                @endforeach
            </td>
            <td>
                <a class="btn btn-sm btn-info" href="/films/{{ $film->film_id }}">Ver más</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

