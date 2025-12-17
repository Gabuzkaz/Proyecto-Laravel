@extends('layout')

@section('content')
<h2>Nuevo Idioma</h2>

<form method="POST" action="{{ route('languages.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Nombre del idioma</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
