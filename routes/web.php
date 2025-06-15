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
  return view('concerts.index');
});

Route::get('/concerts/book', function () {
  return view('concerts.book');
});

Route::get('/singers/detail', function () {
  return view('singers.detail');
});

Route::get('/payment', function () {
  return view('payment');
});

Route::get('/signin', function () {
  return view('users.signin');
});

Route::get('/signup', function () {
  return view('users.signup');
});