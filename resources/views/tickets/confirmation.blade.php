@extends('layouts.default')
@section('title', 'Encore | Music Festival 2025')

@section('content')

  <section class="bg-white py-8 md:py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mb-8 lg:mb-16">
      <h2 class="text-3xl sm:text-4xl font-bold text-black">
        Order Summary
      </h2>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-8">
      <!-- Left: Concert Image -->
      <div class="flex items-center justify-center">
        <img src="{{ $concert->image }}" alt="{{ $concert->name }}" class="rounded-lg shadow-lg w-full max-w-md object-cover">
      </div>

      <!-- Right: Order Summary -->
      <div class="w-full">
        {{-- Ticket List --}}
        @foreach ($selectedTickets as $ticket)
          <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center bg-white border-b py-4">
            <div>
              <p class="text-gray-700 font-medium">{{ $concert->name }}</p>
              <p class="text-sm text-gray-500">Section: {{ $ticket['section'] }}</p>
              <p class="text-sm text-gray-500">Qty: {{ $ticket['quantity'] }}</p>
            </div>
            <div class="mt-2 sm:mt-0">
              <p class="text-base font-semibold text-black">
                IDR {{ number_format($ticket['price'] * $ticket['quantity'], 0, ',', '.') }}
              </p>
            </div>
          </div>
        @endforeach

        {{-- Total Section --}}
        @php
          $subtotal = collect($selectedTickets)->sum(fn($t) => $t['price'] * $t['quantity']);
          $service = 10000;
          $total = $subtotal + $service;
        @endphp

        <div class="bg-white py-4 border-gray-200 mt-4">
          <div class="flex justify-between text-gray-600 mb-2">
            <span>Subtotal</span>
            <span>IDR {{ number_format($subtotal, 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between text-gray-600 mb-2">
            <span>Service Fee</span>
            <span>IDR {{ number_format($service, 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between font-semibold text-black">
            <span>Total</span>
            <span>IDR {{ number_format($total, 0, ',', '.') }}</span>
          </div>
        </div>

        {{-- Checkout Button --}}
        <div class="mt-6 text-right">
          <form method="POST" action="{{ route('checkout.store', ['id' => $concert->id]) }}">
            @csrf
            <input type="hidden" name="tickets" value="{{ json_encode($selectedTickets) }}">
            <button type="submit" class="bg-sky-600 hover:bg-sky-500 text-white font-semibold px-6 py-2 rounded shadow transition duration-200 cursor-pointer">
              Checkout
            </button>
          </form>
        </div>
      </div>
    </div>
  </section>

@endsection
