@extends('layout')

@section('content')
<h2>Nuevo Pago</h2>

<form method="POST" action="{{ route('payments.store') }}">
    @csrf

    <div class="mb-3">
        <label>Cliente</label>
        <select name="customer_id" class="form-control">
            @foreach($customers as $c)
                <option value="{{ $c->customer_id }}">{{ $c->first_name }} {{ $c->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Staff</label>
        <select name="staff_id" class="form-control">
            @foreach($staffs as $s)
                <option value="{{ $s->staff_id }}">{{ $s->first_name }} {{ $s->last_name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Monto</label>
        <input type="number" step="0.01" name="amount" class="form-control" required>
    </div>

    <button class="btn btn-success">Guardar</button>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
