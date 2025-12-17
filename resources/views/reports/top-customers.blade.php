@extends('layout')

@section('content')
    <h1 class="mb-4">Top 10 Clientes que Más Pagaron</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Total Pagado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $row)
                <tr>
                    <td>{{ $row->customer_id }}</td>
                    <td>{{ $row->name }}</td>
                    <td>${{ $row->total_paid }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
