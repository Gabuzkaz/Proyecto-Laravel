@extends('layout')

@section('content')
<h2>Editar Actor</h2>

<form method="POST" action="{{ route('actors.update', $actor->actor_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="first_name" value="{{ $actor->first_name }}" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Apellido</label>
        <input type="text" name="last_name" value="{{ $actor->last_name }}" class="form-control" required>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('actors.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
