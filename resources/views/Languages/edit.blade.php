@extends('layout')

@section('content')
<h2>Editar Idioma</h2>

<form method="POST" action="{{ route('languages.update', $language) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre del idioma</label>
        <input type="text" name="name" value="{{ $language->name }}" class="form-control" required>
    </div>

    <button class="btn btn-warning">Actualizar</button>
    <a href="{{ route('languages.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
