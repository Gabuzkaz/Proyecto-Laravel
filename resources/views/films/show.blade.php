@extends('layout')

@section('content')
<h1>{{ $film->title }}</h1>

<p><strong>Descripción:</strong> {{ $film->description }}</p>

<h4>Categorías:</h4>
@foreach($film->categories as $c)
    <span class="badge bg-success">{{ $c->name }}</span>
@endforeach

<h4 class="mt-4">Actores:</h4>
<ul>
@foreach($film->actors as $actor)
    <li>{{ $actor->first_name }} {{ $actor->last_name }}</li>
@endforeach
</ul>

@endsection

