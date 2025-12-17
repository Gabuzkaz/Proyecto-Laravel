@extends('layout')

@section('content')
<h2>Editar Empleado</h2>

<form method="POST" action="{{ route('staff.update', $staff->staff_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="first_name" class="form-control" value="{{ $staff->first_name }}" required>
    </div>

    <div class="mb-3">
        <label>Apellido</label>
        <input type="text" name="last_name" class="form-control" value="{{ $staff->last_name }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $staff->email }}" required>
    </div>

    <button class="btn btn-success">Actualizar</button>
    <a href="{{ route('staff.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
