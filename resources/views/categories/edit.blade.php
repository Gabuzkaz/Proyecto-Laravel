@extends('layout')

@section('content')
<h2>Editar Categoría</h2>

<form method="POST" action="{{ route('categories.update', $category->category_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ $category->name }}" required>
    </div>

    <button class="btn btn-success">Actualizar</button>
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
