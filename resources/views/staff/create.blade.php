@extends('layout')

@section('content')
<h2>Nuevo Empleado</h2>

<form method="POST" action="{{ route('staff.store') }}">
    @csrf

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Apellido</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
