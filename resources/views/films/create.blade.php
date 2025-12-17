@extends('layout')

@section('content')
<h2>Nueva Película</h2>

<form action="{{ route('films.store') }}" method="POST">
    @csrf

    <!-- TÍTULO -->
    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- DESCRIPCIÓN -->
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <!-- AÑO -->
    <div class="mb-3">
        <label class="form-label">Año</label>
        <input type="number" name="release_year" class="form-control">
    </div>

    <!-- IDIOMA -->
    <div class="mb-3">
        <label class="form-label">Idioma</label>
        <select name="language_id" class="form-control" required>
            <option value="">Seleccione...</option>
            @foreach($languages as $lng)
                <option value="{{ $lng->language_id }}">{{ $lng->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- ACTORES -->
    <div class="mb-3">
        <label for="actors">Actores</label>
<select name="actors[]" id="actors" class="form-control" multiple>
    @foreach ($actors as $actor)
        <option value="{{ $actor->actor_id }}">
            {{ $actor->first_name }} {{ $actor->last_name }}
        </option>
    @endforeach
</select>

    </div>

    <!-- CATEGORÍAS -->
    <div class="mb-3">
        <label class="form-label">Categorías</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach($categories as $cat)
                <option value="{{ $cat->category_id }}">
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- BOTÓN -->
    <button class="btn btn-success">Guardar</button>
</form>

@endsection
