@extends('layout')

@section('content')
<h1 class="mb-4">Películas Exclusivas de la Tienda {{ $store_id }}</h1>

@if ($data->isEmpty())
    <div class="alert alert-info">No hay películas exclusivas en esta tienda.</div>
@else
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID Película</th>
            <th>Título</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->film_id }}</td>
                <td>{{ $row->title }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif

<a href="{{ route('reports.exclusive-films', $store_id) }}" class="btn btn-primary mt-3">
    Volver a Películas Exclusivas
</a>

@endsection
