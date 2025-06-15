@extends('layouts.default')
@section('title', 'Encore | Music Festival 2025')

@section('content')

  <section class="bg-white py-8 md:py-16">
    <div class="mx-auto max-w-6xl mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-bold text-black">
        Order Summary
      </h2>
    </div>

    {{-- Ticket card --}}
    <div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="Seated" data-price="2000000">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <p class="text-lg text-gray-500">Ed Sheeran +-=÷x Tour 2025</p>
          <p class="text-lg text-gray-500">Reguler</p>
        </div>
      </div>

      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">
        <div class="flex items-center space-x-2 py-1">
          IDR 1.000.000
        </div>
      </div>
    </div>

    {{-- Ticket card --}}
    <div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="Seated" data-price="2000000">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <p class="text-lg text-gray-500">Ed Sheeran +-=÷x Tour 2025</p>
          <p class="text-lg text-gray-500">Reguler</p>
        </div>
      </div>

      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">
        <div class="flex items-center space-x-2 py-1">
          IDR 1.000.000
        </div>
      </div>
    </div>

    {{-- Total Section --}}
    <div id="price-summary" class="flex bg-white max-w-6xl mx-auto mb-4">
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-black">Subtotal</h2>
          <h2 class="text-lg text-black">Service</h2>
          <h2 class="text-lg text-black">Total</h2>
        </div>
      </div>
      <div class="flex flex-col gap-8 items-center text-end justify-center px-5 space-y-2">
        <div>
          <h2 class="text-lg text-black" id="subtotal">IDR 2.000.000</h2>
          <h2 class="text-lg text-black" id="service">IDR 10.000</h2>
          <h2 class="text-lg text-black" id="subtotal">IDR 2.010.000</h2>
        </div>
      </div>
    </div>

    {{-- Checkout Button --}}
    <div id="checkout-section" class="flex max-w-6xl mx-auto justify-end items-center px-5">
      <a href="/payment" class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">Checkout</a>
    </div>
  </section>

@endsection
