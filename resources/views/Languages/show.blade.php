@extends('layout')

@section('content')
<h2>Detalles del Idioma</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID:</strong> {{ $language->language_id }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $language->name }}</li>
</ul>

<a href="{{ route('languages.index') }}" class="btn btn-secondary">Volver</a>
@endsection
