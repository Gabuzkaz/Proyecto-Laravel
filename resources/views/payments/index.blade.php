@extends('layout')

@section('content')
<h2>Pagos</h2>
<form method="GET" action="{{ route('payments.index') }}" class="mb-3">
    <input type="text" name="search" class="form-control" placeholder="Buscar pago..."
           value="{{ request('search') }}">
</form>

<a href="{{ route('payments.create') }}" class="btn btn-primary mb-3">Nuevo Pago</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Staff</th>
            <th>Monto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($payments as $pay)
        <tr>
            <td>{{ $pay->payment_id }}</td>
            <td>{{ $pay->customer->first_name }} {{ $pay->customer->last_name }}</td>
            <td>{{ $pay->staff->first_name }} {{ $pay->staff->last_name }}</td>
            <td>${{ $pay->amount }}</td>
            <td>
                <a href="{{ route('payments.show', $pay->payment_id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('payments.edit', $pay->payment_id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('payments.destroy', $pay->payment_id) }}" method="POST" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
