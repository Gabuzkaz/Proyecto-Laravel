@extends('layout')

@section('content')
<h1>Reportes</h1>

<ul>
    <li><a href="{{ route('reports.top-customers') }}">Clientes con más alquileres</a></li>
</ul>
@endsection
