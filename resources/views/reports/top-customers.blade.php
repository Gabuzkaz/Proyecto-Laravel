@extends('layout')

@section('content')
<h1>Top Clientes</h1>

<table class="table">
    <thead>
        <tr>
            <th>Cliente</th>
            <th>Total Pagado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->name }}</td>
            <td>${{ $d->total_paid }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

