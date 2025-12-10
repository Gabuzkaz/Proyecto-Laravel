<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rutas del proyecto Sakila
|--------------------------------------------------------------------------
*/

// DASHBOARD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// FILMS
Route::get('/films', [FilmController::class, 'index'])->name('films.index');
Route::get('/films/{id}', [FilmController::class, 'show'])->name('films.show');

// CUSTOMERS
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::get('/customers/{id}', [CustomerController::class, 'show'])->name('customers.show');

// REPORTES
Route::get('/reports/top-customers', [ReportController::class, 'topCustomers'])->name('reports.top-customers');
Route::get('/reports/top-films', [ReportController::class, 'topFilms'])->name('reports.top-films');
Route::get('/reports/rentals-per-store', [ReportController::class, 'rentalsPerStore'])->name('reports.rentals-per-store');


