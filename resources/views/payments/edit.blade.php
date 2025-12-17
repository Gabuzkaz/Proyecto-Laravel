@extends('layout')

@section('content')
<h2>Editar Pago</h2>

<form method="POST" action="{{ route('payments.update', $payment->payment_id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Cliente</label>
        <select name="customer_id" class="form-control">
            @foreach($customers as $c)
                <option value="{{ $c->customer_id }}" {{ $payment->customer_id == $c->customer_id ? 'selected' : '' }}>
                    {{ $c->first_name }} {{ $c->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Staff</label>
        <select name="staff_id" class="form-control">
            @foreach($staffs as $s)
                <option value="{{ $s->staff_id }}" {{ $payment->staff_id == $s->staff_id ? 'selected' : '' }}>
                    {{ $s->first_name }} {{ $s->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Monto</label>
        <input type="number" step="0.01" name="amount" value="{{ $payment->amount }}" class="form-control" required>
    </div>

    <button class="btn btn-success">Actualizar</button>
    <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
