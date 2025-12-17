@extends('layout')


@section('content')
<h1 class="mb-4">Dashboard</h1>

<div class="row">
    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h4>Clientes</h4>
            <p>{{ $total_customers }}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h4>Películas</h4>
            <p>{{ $total_films }}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h4>Rentas</h4>
            <p>{{ $total_rentals }}</p>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 text-center shadow">
            <h4>Pagos</h4>
            <p>{{ $total_payments }}</p>
        </div>
    </div>
</div>
@endsection

