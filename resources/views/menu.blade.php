<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('dashboard') }}">SAKILA SYSTEM</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                data-bs-target="#navbarNav" aria-controls="navbarNav" 
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('films.index') }}">Films</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customers.index') }}">Customers</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('actors.index') }}">Actors</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('languages.index') }}">Languages</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('rentals.index') }}">Rentals</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('payments.index') }}">Payments</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('stores.index') }}">Stores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('staff.index') }}">Staff</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inventory.index') }}">Inventory</a>
                </li>

                <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="reportsDropdown"
       role="button" data-bs-toggle="dropdown">
        Reports
    </a>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="{{ route('reports.top-customers') }}">Top Customers</a></li>
        <li><a class="dropdown-item" href="{{ route('reports.top-films') }}">Top Films</a></li>
        <li><a class="dropdown-item" href="{{ route('reports.rentals-per-store') }}">Rentals per Store</a></li>
        <li><a class="dropdown-item" href="{{ route('reports.exclusive-films') }}">Exclusive Films per Store</a></li>
    </ul>
</li>


            </ul>
        </div>
    </div>
</nav>
