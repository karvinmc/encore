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
        Choose Your Seat
      </h2>
    </div>

    <div class="mx-auto max-w-6xl mb-8 lg:mb-16">
      @include('includes.seat')
    </div>
  </section>

  <section class="bg-white">
    <div class="mx-auto max-w-6xl mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-bold text-black">
        Ticket Information
      </h2>
    </div>

    {{-- Ticket cards --}}
    <div class="flex bg-white max-w-6xl mx-auto mb-4 border-b">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-gray-500">SUN, 20 July 2025 • 08:00 PM</h2>
          <p class="text-lg text-gray-500">Gelora Bung Karno • Jakarta, Indonesia</p>
          <p class="text-lg text-gray-500">Ed Sheeran +-=÷x Tour 2025</p>
          <p class="text-lg text-black">Price IDR 1.000.000 • Standing</p>
        </div>
      </div>

      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">
        {{-- Trash Icon --}}
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-red-500 cursor-pointer">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
        </svg>

        {{-- Quantity Selector --}}
        <div class="flex items-center space-x-2 border rounded px-2 py-1">
          <button class="text-gray-600 hover:text-black">-</button>
          <span class="w-6 text-center">1</span>
          <button class="text-gray-600 hover:text-black">+</button>
        </div>
      </div>
    </div>

    {{-- Subtotal --}}
    <div class="flex bg-white max-w-6xl mx-auto mb-4 border-b">

      {{-- Left --}}
      <div class="flex-1 py-5 justify-between">
        <div>
          <h2 class="text-lg text-black">Subtotal</h2>
          <h2 class="text-lg text-black">Service</h2>
          <h2 class="text-lg text-black">Total</h2>
        </div>
      </div>
      {{-- Right --}}
      <div class="flex flex-col gap-8 items-center text-end justify-center px-5 space-y-2">
        <div>
          <h2 class="text-lg text-black">IDR 1.000.000</h2>
          <h2 class="text-lg text-black">IDR 10.000</h2>
          <h2 class="text-lg text-black">IDR 1.010.000</h2>
        </div>
      </div>
  </section>

@endsection
