@extends('layout')

@section('content')
<h2>Clientes</h2>

<a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Nuevo Cliente</a>

<form method="GET" action="{{ route('customers.index') }}" class="mb-3">
    <input type="text" name="search" value="{{ $search }}" class="form-control"
           placeholder="Buscar por nombre, apellido o email">
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombres</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->customer_id }}</td>
            <td>{{ $customer->first_name }} {{ $customer->last_name }}</td>
            <td>{{ $customer->email }}</td>
            <td>
                <a href="{{ route('customers.show', $customer) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm">Editar</a>

                <form action="{{ route('customers.destroy', $customer) }}"
                      method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $customers->links() }}
@endsection
