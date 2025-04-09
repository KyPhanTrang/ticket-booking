<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AuthController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Middleware\AuthenticateMiddleware;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ShowtimeController;
use App\Models\Cinema;
use App\Models\Seat;
use App\Models\Hall;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('homes.index');

// Backend
// admin => AuthenticateMiddleware::class
Route::get('/dashboard/index', [DashboardController::class, 'index'])->name('dashboard.index')->middleware('admin');

Route::get('/admin', [AuthController::class, 'index'])->name('auth.admin');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Resources
Route::resource('tickets', TicketController::class);
Route::resource('cinemas', CinemaController::class)->middleware('admin');
Route::resource('movies', MovieController::class)->middleware('admin');
Route::resource('showtimes', ShowtimeController::class)->middleware('admin');

// Custom Routes
Route::get('/ticket/{movie_id}', [TicketController::class, 'create'])->name('tickets.create');
Route::get('/get-seats/{hall_id}', function($hall_id) {
    return Seat::where('hall_id', $hall_id)->get();
});
Route::get('/get-cinemas', function() {
    return Cinema::all();
});

// routes/web.php
Route::get('/get-halls/{cinema_id}', function ($cinema_id) {
    return Hall::where('cinema_id', $cinema_id)->get();
});

Route::get('/get-cinemas/{location}', function ($location){
    return Cinema::where('location', $location)->get();
});

//Home
Route::get('/home/home_cinemas', [HomeController::class, 'home_cinemas'])->name('homes.home_cinemas');