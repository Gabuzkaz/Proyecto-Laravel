@extends('layout')

@section('content')
<h2>Detalles del Actor</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID:</strong> {{ $actor->actor_id }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $actor->first_name }}</li>
    <li class="list-group-item"><strong>Apellido:</strong> {{ $actor->last_name }}</li>
</ul>

<a href="{{ route('actors.index') }}" class="btn btn-secondary">Volver</a>
<a href="{{ route('actors.edit', $actor->actor_id) }}" class="btn btn-warning">Editar</a>
@endsection
