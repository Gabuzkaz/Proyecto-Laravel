@extends('layout')

@section('content')
<h2>Detalle de Película</h2>

<p><strong>ID:</strong> {{ $film->film_id }}</p>
<p><strong>Título:</strong> {{ $film->title }}</p>
<p><strong>Año:</strong> {{ $film->release_year }}</p>
<p><strong>Descripción:</strong> {{ $film->description }}</p>

{{-- Idioma --}}
<p><strong>Idioma:</strong>
    {{ $film->language ? $film->language->name : 'No definido' }}
</p>

{{-- Categorías --}}
<p><strong>Categorías:</strong>
    @foreach ($film->categories as $c)
        {{ $c->name }}@if(!$loop->last),@endif
    @endforeach
</p>

{{-- Actores --}}
<p><strong>Actores:</strong>
    @foreach ($film->actors as $a)
        {{ $a->first_name }} {{ $a->last_name }}@if(!$loop->last),@endif
    @endforeach
</p>
@endsection
