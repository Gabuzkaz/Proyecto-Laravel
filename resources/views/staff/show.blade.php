@extends('layout')

@section('content')
<h2>Información del Empleado</h2>

<ul class="list-group mb-3">
    <li class="list-group-item"><strong>ID:</strong> {{ $staff->staff_id }}</li>
    <li class="list-group-item"><strong>Nombre:</strong> {{ $staff->first_name }} {{ $staff->last_name }}</li>
    <li class="list-group-item"><strong>Email:</strong> {{ $staff->email }}</li>
</ul>

<a href="{{ route('staff.index') }}" class="btn btn-primary">Volver</a>
@endsection
