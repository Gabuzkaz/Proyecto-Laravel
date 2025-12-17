@extends('layout')

@section('content')
<h2>Nuevo Actor</h2>

<form method="POST" action="{{ route('actors.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="first_name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="last_name" class="form-control" required>
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('actors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
