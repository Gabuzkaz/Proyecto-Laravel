@extends('layout')

@section('content')

<h1 class="mb-4">Seleccionar Tienda</h1>

<form action="{{ route('reports.exclusive-films.store', ['store_id' => 0]) }}" method="GET" id="storeForm">

    <label class="form-label">Elige una tienda:</label>
    <select name="store_id" id="storeSelect" class="form-select" required>
        <option value="">-- Seleccionar --</option>
        <option value="1">Tienda 1</option>
        <option value="2">Tienda 2</option>
    </select>

</form>

<script>
document.getElementById('storeSelect').addEventListener('change', function() {
    let id = this.value;
    if (id) {
        window.location.href = "/reports/exclusive-films/" + id;
    }
});
</script>

@endsection
