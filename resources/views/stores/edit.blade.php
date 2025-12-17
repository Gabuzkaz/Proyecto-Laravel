@extends('layout')

@section('content')
<h2>Editar Tienda</h2>

<form method="POST" action="{{ route('stores.update', $store->store_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Manager</label>
        <select name="manager_staff_id" class="form-control" required>
            @foreach ($staff as $s)
                <option value="{{ $s->staff_id }}" 
                    @if($store->manager_staff_id == $s->staff_id) selected @endif>
                    {{ $s->first_name }} {{ $s->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Dirección</label>
        <select name="address_id" class="form-control" required>
            @foreach ($addresses as $addr)
                <option value="{{ $addr->address_id }}" 
                    @if($store->address_id == $addr->address_id) selected @endif>
                    {{ $addr->address }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Actualizar</button>
    <a href="{{ route('stores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
