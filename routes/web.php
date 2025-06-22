<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
  return view('home');
});

Route::get('/concerts', function () {
  return view(view: 'concerts.index');
});

Route::get('/tickets/concert-name', function () {
  return view('tickets.book');
});

Route::get('/tickets/concert-name/confirm', function () {
  return view('tickets.confirmation');
});

Route::get('/singers', function () {
  return view('singers.index');
});

Route::get('/singer-name/concerts', function () {
  return view('singers.show');
});

Route::get('/login', function () {
  return view('auth.login');
});

Route::get('/register', function () {
  return view('auth.register');
});
