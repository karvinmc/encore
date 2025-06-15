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
    @include('components.ticket-card')

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
      <a href="{{ url('/tickets/concert-name/confirm') }}" class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">Book</a>
    </div>
  </section>

@endsection
