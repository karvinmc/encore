<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/concerts', [ConcertController::class, 'index']);
Route::get('/concerts/singer/{id}', [SingerController::class, 'show']);

Route::middleware(['auth', 'role:admin,customer'])->group(function () {
  Route::get('/tickets/{id}/book', [TicketController::class, 'show']);
  Route::post('/tickets/{id}/confirm', [TicketController::class, 'confirm'])->name('tickets.confirm');
  Route::post('/checkout/{id}', [BookingController::class, 'store'])->name('checkout.store');
});

Route::middleware(['auth', 'role:admin'])->group(function (){
  Route::get('/admin/dashboard', [DashboardController::class, 'index']);
});

Route::get('/login', function () {
  return view('auth.login');
});

Route::get('/register', function () {
  return view('auth.register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
