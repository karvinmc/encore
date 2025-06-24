@extends('layouts.admin')
@section('title', 'Tickets')

@section('content')
  <div class="p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-semibold text-gray-800">Tickets</h1>
      <button onclick="openModal()"
              class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Add Ticket
      </button>
    </div>

    <div class="max-w-7xl mx-auto flex items-center mb-6">
      @if (session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
          {{ session('success') }}
        </div>
      @endif
    </div>

    <div class="max-w-7xl flex items-center mb-4">
      <div>
        <form method="GET" action="{{ route('admin.tickets.index') }}" class="mb-4">
          <label for="concert_filter" class="block mb-1 font-medium text-sm">Filter by Concert</label>
          <div class="flex gap-2">
            <select name="concert_id" id="concert_filter" class="px-3 py-2 border rounded w-64">
              <option value="">All Concerts</option>
              @foreach ($concerts as $concertOption)
                <option value="{{ $concertOption->id }}" {{ request('concert_id') == $concertOption->id ? 'selected' : '' }}>
                  {{ $concertOption->name }}
                </option>
              @endforeach
            </select>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition cursor-pointer">Filter</button>
          </div>
        </form>
      </div>
    </div>

    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
      <table class="min-w-full table-auto text-sm text-left text-gray-700">
        <thead class="bg-gray-100 text-gray-800 font-semibold uppercase tracking-wider">
          <tr>
            <th class="px-6 py-3 border-b uppercase">ID</th>
            <th class="px-6 py-3 border-b uppercase">Concert</th>
            <th class="px-6 py-3 border-b uppercase">Venue Section</th>
            <th class="px-6 py-3 border-b uppercase">Price</th>
            <th class="px-6 py-3 border-b uppercase">Stock</th>
            <th class="px-6 py-3 border-b uppercase">Created At</th>
            <th class="px-6 py-3 border-b uppercase">Updated At</th>
            <th class="px-6 py-3 border-b text-center uppercase">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($tickets as $ticket)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4">{{ $ticket->id }}</td>
              <td class="px-6 py-4">{{ $ticket->concert->name }}</td>
              <td class="px-6 py-4">{{ $ticket->section->name }}</td>
              <td class="px-6 py-4">{{ $ticket->price }}</td>
              <td class="px-6 py-4">{{ $ticket->stock }}</td>
              <td class="px-6 py-4">{{ $ticket->created_at }}</td>
              <td class="px-6 py-4">{{ $ticket->updated_at }}</td>
              <td class="px-6 py-4 flex justify-center gap-2">
                <button
                        class="edit-btn inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm cursor-pointer"
                        data-id="{{ $ticket->id }}"
                        data-concertId="{{ $ticket->concert->id }}"
                        data-sectionId="{{ $ticket->section->id }}"
                        data-price="{{ $ticket->price }}"
                        data-stock="{{ $ticket->stock }}">
                  Edit
                </button>
                <form action="{{ route('admin.tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
              <td colspan="4" class="px-6 py-4 text-center text-gray-500">No tickets found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @include('admin.tickets.form')
@endsection
