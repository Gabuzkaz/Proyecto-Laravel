@extends('layout')

@section('content')
<h2>Editar Alquiler</h2>

<form method="POST" action="{{ route('rentals.update', $rental) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Cliente</label>
        <select name="customer_id" class="form-control">
            @foreach($customers as $c)
                <option value="{{ $c->customer_id }}" 
                    @selected($c->customer_id == $rental->customer_id)>
                    {{ $c->first_name }} {{ $c->last_name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Inventario</label>
        <select name="inventory_id" class="form-control">
            @foreach($inventory as $inv)
                <option value="{{ $inv->inventory_id }}"
                    @selected($inv->inventory_id == $rental->inventory_id)>
                    {{ $inv->film->title }}
                </option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-warning">Actualizar</button>
</form>
@endsection
