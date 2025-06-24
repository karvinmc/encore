@extends('layouts.default')
@section('title', 'My Bookings')

@section('content')

  {{-- Profile Header --}}
  <section class="bg-white mx-10 pt-16 lg:px-6">
    <div class="max-w-screen-lg mx-auto text-center mb-8">
      <h2 class="text-4xl font-extrabold text-black">
        {{ Auth::user()->name }}'s Bookings
      </h2>
      <p class="text-gray-600 mt-2 text-lg">Your concert booking history</p>
    </div>
  </section>

  {{-- Booking Table --}}
  <section class="bg-white mx-10 py-16">
    <div class="max-w-7xl mx-auto px-4">
      @if ($bookings->isEmpty())
        <div class="text-center text-gray-500 text-lg">You haven't booked any concerts yet.</div>
      @else
        <div class="overflow-x-auto border border-gray-300 rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-sky-600">
              <tr>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Concert</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Venue</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Date</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Section</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Total Price</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Quantity</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Booked At</th>
                <th class="px-6 py-3 text-left text-xs font-semibold text-white uppercase tracking-wider">Status</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
              @foreach ($bookings as $booking)
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4 font-medium text-black">{{ $booking->ticket->concert->name }}</td>
                  <td class="px-6 py-4">{{ $booking->ticket->concert->venue->name }}</td>
                  <td class="px-6 py-4">{{ \Carbon\Carbon::parse($booking->ticket->concert->date)->format('M d, Y') }}</td>
                  <td class="px-6 py-4">{{ $booking->ticket->section->name }}</td>
                  <td class="px-6 py-4">{{ number_format($booking->total_price, 0, ',', '.') }} IDR</td>
                  <td class="px-6 py-4">{{ $booking->quantity }}</td>
                  <td class="px-6 py-4">{{ \Carbon\Carbon::parse($booking->created_at)->format('M d, Y H:i') }}</td>
                  <td class="px-6 py-4">
                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                      {{ $booking->status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                      {{ ucfirst($booking->status) }}
                    </span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endif

    </div>
  </section>

@endsection
