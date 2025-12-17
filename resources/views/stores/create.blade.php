@extends('layout')

@section('content')
<h2>Nueva Tienda</h2>

<form method="POST" action="{{ route('stores.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Manager</label>
        <select name="manager_staff_id" class="form-control" required>
            @foreach ($staff as $s)
                <option value="{{ $s->staff_id }}">{{ $s->first_name }} {{ $s->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Dirección</label>
        <select name="address_id" class="form-control" required>
            @foreach ($addresses as $addr)
                <option value="{{ $addr->address_id }}">{{ $addr->address }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('stores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
