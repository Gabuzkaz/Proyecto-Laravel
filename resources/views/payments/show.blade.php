@extends('layout')

@section('content')
<h2>Detalle del Pago</h2>

<ul class="list-group">
    <li class="list-group-item"><strong>ID:</strong> {{ $payment->payment_id }}</li>
    <li class="list-group-item"><strong>Cliente:</strong> {{ $payment->customer->first_name }} {{ $payment->customer->last_name }}</li>
    <li class="list-group-item"><strong>Staff:</strong> {{ $payment->staff->first_name }} {{ $payment->staff->last_name }}</li>
    <li class="list-group-item"><strong>Monto:</strong> ${{ $payment->amount }}</li>
</ul>

<a href="{{ route('payments.index') }}" class="btn btn-secondary mt-3">Volver</a>
@endsection
