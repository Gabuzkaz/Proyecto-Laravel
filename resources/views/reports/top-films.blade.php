@extends('layout')

@section('content')
<h1>Películas Más Rentadas</h1>

<table class="table">
    <thead>
        <tr>
            <th>Título</th>
            <th>Rentas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->title }}</td>
            <td>{{ $d->rentals }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
