@extends('layouts.admin')
@section('title', 'Bookings')

@section('content')
  <div class="p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-semibold text-gray-800">Bookings</h1>
    </div>

    <div class="max-w-7xl mx-auto flex items-center mb-6">
      @if (session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
          {{ session('success') }}
        </div>
      @endif
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="min-w-full table-auto text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-800 font-semibold uppercase tracking-wider">
          <tr>
            <th class="px-6 py-3 border-b uppercase">ID</th>
            <th class="px-6 py-3 border-b uppercase">User</th>
            <th class="px-6 py-3 border-b uppercase">Concert</th>
            <th class="px-6 py-3 border-b uppercase">Venue</th>
            <th class="px-6 py-3 border-b uppercase">Section</th>
            <th class="px-6 py-3 border-b uppercase">Quantity</th>
            <th class="px-6 py-3 border-b uppercase">Total Price</th>
            <th class="px-6 py-3 border-b uppercase">Status</th>
            <th class="px-6 py-3 border-b uppercase">Created At</th>
            <th class="px-6 py-3 border-b uppercase">Updated At</th>
            <th class="px-6 py-3 border-b text-center uppercase">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($bookings as $booking)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4">{{ $booking->id }}</td>
              <td class="px-6 py-4">{{ $booking->user->name }} ({{ $booking->user->id }})</td>
              <td class="px-6 py-4">{{ $booking->ticket->concert->name }}</td>
              <td class="px-6 py-4">{{ $booking->ticket->concert->venue->name }}</td>
              <td class="px-6 py-4">{{ $booking->ticket->section->name }}</td>
              <td class="px-6 py-4">{{ $booking->quantity }}</td>
              <td class="px-6 py-4">{{ $booking->total_price }}</td>
              <td class="px-6 py-4">{{ $booking->status }}</td>
              <td class="px-6 py-4">{{ $booking->created_at }}</td>
              <td class="px-6 py-4">{{ $booking->updated_at }}</td>
              <td class="px-6 py-4 flex justify-center gap-2">
                <button
                        class="edit-btn inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm cursor-pointer"
                        data-id="{{ $booking->id }}"
                        data-userId="{{ $booking->user->id }}"
                        data-ticketId="{{ $booking->ticket->id }}"
                        data-quantity="{{ $booking->quantity }}"
                        data-totalPrice="{{ $booking->total_price }}"
                        data-status="{{ $booking->status }}">
                  Edit
                </button>
                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit"
                          class="inline-flex items-center px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm cursor-pointer">
                    Delete
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-6 py-4 text-center text-gray-500">No bookings found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @include('admin.bookings.form')
@endsection
