@extends('layout')

@section('content')
<h2>Detalles de la Categoría</h2>

<p><strong>ID:</strong> {{ $category->category_id }}</p>
<p><strong>Nombre:</strong> {{ $category->name }}</p>

<a href="{{ route('categories.index') }}" class="btn btn-primary">Volver</a>
@endsection
