@extends('layout')

@section('content')
    <h1 class="mb-4">Dashboard SAKILA</h1>

    <div class="row">

        <div class="col-md-3">
            <div class="card text-bg-primary mb-3">
                <div class="card-header">Películas</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $stats['total_films'] }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-success mb-3">
                <div class="card-header">Actores</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $stats['total_actors'] }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-warning mb-3">
                <div class="card-header">Clientes</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $stats['total_customers'] }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-bg-danger mb-3">
                <div class="card-header">Alquileres Activos</div>
                <div class="card-body">
                    <h4 class="card-title">{{ $stats['rentals_active'] }}</h4>
                </div>
            </div>
        </div>

    </div>
@endsection
