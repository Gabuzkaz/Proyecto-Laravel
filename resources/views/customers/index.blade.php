@extends('layout')

@section('content')
<h1>Clientes</h1>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Ver</th>
        </tr>
    </thead>

    <tbody>
        @foreach($customers as $c)
        <tr>
            <td>{{ $c->customer_id }}</td>
            <td>{{ $c->first_name }} {{ $c->last_name }}</td>
            <td>{{ $c->email }}</td>
            <td>
                <a class="btn btn-info btn-sm" href="/customers/{{ $c->customer_id }}">
                    Detalles
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
