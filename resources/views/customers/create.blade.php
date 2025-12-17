@extends('layout')

@section('content')
<h2>Nuevo Cliente</h2>

<form method="POST" action="{{ route('customers.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input name="first_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Apellido</label>
        <input name="last_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control" required>
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
