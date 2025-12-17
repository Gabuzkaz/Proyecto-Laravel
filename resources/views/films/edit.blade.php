@extends('layout')

@section('content')
<h2>Editar Película</h2>

<form method="POST" action="{{ route('films.update', $film) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Título</label>
        <input type="text" name="title" class="form-control" value="{{ $film->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="description" class="form-control">{{ $film->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Año</label>
        <input type="number" name="release_year" class="form-control" value="{{ $film->release_year }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Idioma</label>
        <select name="language_id" class="form-control" required>
            @foreach($languages as $lang)
                <option value="{{ $lang->language_id }}"
                    {{ $film->language_id == $lang->language_id ? 'selected' : '' }}>
                    {{ $lang->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Categorías</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach($categories as $cat)
                <option value="{{ $cat->category_id }}"
                    {{ $film->categories->contains($cat->category_id) ? 'selected' : '' }}>
                    {{ $cat->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Actores</label>
        <select name="actors[]" class="form-control" multiple>
            @foreach($actors as $actor)
                <option value="{{ $actor->actor_id }}"
                    {{ $film->actors->contains($actor->actor_id) ? 'selected' : '' }}>
                    {{ $actor->first_name }} {{ $actor->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-primary">Actualizar</button>
    <a href="{{ route('films.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
