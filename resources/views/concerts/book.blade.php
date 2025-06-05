@extends('layouts.default')
@section('title', 'Encore | Music Festival 2025')

@section('content')

  <section
           class="flex items-center justify-center relative bg-cover bg-center bg-no-repeat min-h-[400px] px-4 sm:px-8 lg:px-16 py-16"
           style="background-image: url('{{ asset('img/concerts/placeholder.jpg') }}')">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-6xl mx-auto">
      <h2 class="text-4xl tracking-tight font-bold text-white mb-1">Music Festival 2025</h2>
      <p class="text-xl font-semibold text-white">Sun, 20 July 2025 . 08:00 PM</p>
      <p class="text-xl font-semibold text-white">Gelora Bung Karno . Jakarta, Indonesia</p>
    </div>
  </section>

  <section class="bg-white py-8 md:py-16">
    <div class="mx-auto max-w-6xl mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-bold text-black">
        Ticket Information
      </h2>
    </div>

    {{-- Ticket card --}}
    <div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="Reguler" data-price="1000000">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-gray-500">Reguler</h2>
          <p class="text-lg text-black">Price IDR 1.000.000</p>
        </div>
      </div>

      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">

        {{-- Quantity Selector --}}
        <div class="flex items-center space-x-2 border rounded px-2 py-1">
          <button class="decrement text-gray-600 hover:text-black cursor-pointer">-</button>
          <span class="quantity w-6 text-center">0</span>
          <button class="increment text-gray-600 hover:text-black cursor-pointer">+</button>
        </div>
      </div>
    </div>

    {{-- Ticket card --}}
    <div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="Seated" data-price="2000000">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-gray-500">Seated</h2>
          <p class="text-lg text-black">Price IDR 2.000.000</p>
        </div>
      </div>

      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">

        {{-- Quantity Selector --}}
        <div class="flex items-center space-x-2 border rounded px-2 py-1">
          <button class="decrement text-gray-600 hover:text-black cursor-pointer">-</button>
          <span class="quantity w-6 text-center">0</span>
          <button class="increment text-gray-600 hover:text-black cursor-pointer">+</button>
        </div>
      </div>
    </div>

    {{-- Ticket card --}}
    <div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="VIP" data-price="3500000">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-gray-500">VIP</h2>
          <p class="text-lg text-black">Price IDR 3.500.000</p>
        </div>
      </div>

      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">

        {{-- Quantity Selector --}}
        <div class="flex items-center space-x-2 border rounded px-2 py-1">
          <button class="decrement text-gray-600 hover:text-black cursor-pointer">-</button>
          <span class="quantity w-6 text-center">0</span>
          <button class="increment text-gray-600 hover:text-black cursor-pointer">+</button>
        </div>
      </div>
    </div>

    {{-- Total Section --}}
    <div id="price-summary" class="bg-white max-w-6xl mx-auto mb-4 hidden">
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-black">Total</h2>
        </div>
      </div>
      <div class="flex flex-col gap-8 items-center text-end justify-center px-5 space-y-2">
        <div>
          <h2 class="text-lg text-black" id="total">IDR 0</h2>
        </div>
      </div>
    </div>

    {{-- Book Button --}}
    <div id="checkout-section" class="max-w-6xl mx-auto justify-end items-center px-5 hidden">
      <a href="/payment" class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">Book</a>
    </div>
  </section>

@endsection
