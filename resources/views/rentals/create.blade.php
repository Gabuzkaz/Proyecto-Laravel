@extends('layout')

@section('content')
<h2>Nuevo Alquiler</h2>

<form method="POST" action="{{ route('rentals.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <select name="customer_id" class="form-control" required>
            @foreach($customers as $c)
                <option value="{{ $c->customer_id }}">{{ $c->first_name }} {{ $c->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Inventario (Película)</label>
        <select name="inventory_id" class="form-control" required>
            @foreach($inventory as $inv)
                <option value="{{ $inv->inventory_id }}">{{ $inv->film->title }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Staff</label>
        <select name="staff_id" class="form-control" required>
            @foreach($staff as $st)
                <option value="{{ $st->staff_id }}">{{ $st->first_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Fecha Renta</label>
        <input type="datetime-local" name="rental_date" class="form-control">
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('rentals.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
