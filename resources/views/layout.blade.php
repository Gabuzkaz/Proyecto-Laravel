<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sakila Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="/">Sakila Dashboard</a>
        <a class="text-white me-3" href="/films">Películas</a>
        <a class="text-white me-3" href="/customers">Clientes</a>
        <a class="text-white me-3" href="/reports/top-customers">Reportes</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
