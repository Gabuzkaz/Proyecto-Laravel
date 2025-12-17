@extends('layout')

@section('content')
<h2>Editar Cliente</h2>

<form method="POST" action="{{ route('customers.update', $customer->customer_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input name="first_name" class="form-control" value="{{ $customer->first_name }}" required>
    </div>

    <div class="mb-3">
        <label>Apellido</label>
        <input name="last_name" class="form-control" value="{{ $customer->last_name }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control" value="{{ $customer->email }}" required>
    </div>

    <button class="btn btn-warning">Actualizar</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
