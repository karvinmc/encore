<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\SingerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VenueController;
use App\Http\Controllers\VenueSectionController;
use App\Http\Controllers\GenreController;


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

Route::get('/', action: [HomeController::class, 'index']);

Route::get('/concerts', [ConcertController::class, 'user_index']);
Route::get('/concerts/search', [SearchController::class, 'search'])->name('concerts.search');
Route::get('/concerts/singer/{id}', [SingerController::class, 'show']);
Route::get('/concerts/{genre}', [ConcertController::class, 'genre'])->name('concerts.genre');

Route::get('/singers', [SingerController::class, 'user_index']);

Route::middleware(['auth', 'role:admin,customer'])->group(function () {
  Route::get('/tickets/{id}/book', [TicketController::class, 'show']);
  Route::post('/tickets/{id}/confirm', [TicketController::class, 'confirm'])->name('tickets.confirm');

  Route::post('/checkout/{id}', [BookingController::class, 'store'])->name('checkout.store');

  Route::get('/bookings', [BookingController::class, 'show'])->name('mybookings.show');
});

Route::get('/login', function () {
  return view('auth.login');
});

Route::get('/register', function () {
  return view('auth.register');
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// ADMIN ROUTES
Route::prefix('admin')->name('admin.')->group(function () {
  Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('users', UserController::class);
    Route::resource('venues', VenueController::class);
    Route::resource('venue_sections', VenueSectionController::class);
    Route::resource('singers', SingerController::class);
    Route::resource('genres', GenreController::class);
    Route::resource('concerts', ConcertController::class);
    Route::resource('tickets', TicketController::class);
    Route::resource('bookings', BookingController::class);
    Route::post('/bookings/admin-store', [BookingController::class, 'adminStore'])->name('bookings.adminStore');

    Route::post('/concerts/attach-singer', [ConcertController::class, 'attachSinger'])->name('concerts.attachSinger');
    Route::post('/concerts/detach-singer', [ConcertController::class, 'detachSinger'])->name('concerts.detachSinger');
    Route::post('/concerts/{concert}/update-singers', [ConcertController::class, 'updateSingers'])->name('concerts.updateSingers');
  });
});
