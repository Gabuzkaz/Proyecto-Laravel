@extends('layout')

@section('content')
<h1>Rentas por Tienda</h1>

<table class="table">
    <thead>
        <tr>
            <th>Tienda</th>
            <th>Rentas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>Tienda #{{ $d->store_id }}</td>
            <td>{{ $d->rentals }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
