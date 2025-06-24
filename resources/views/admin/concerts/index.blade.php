@extends('layouts.admin')
@section('title', 'Concerts')

@section('content')

  <div class="p-6 mb-8">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-semibold text-gray-800">Concerts</h1>
      <button onclick="openModal()"
              class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Add Concerts
      </button>
    </div>

    <div class="max-w-7xl mx-auto flex items-center mb-6">

      @if (session('success'))
        <div class="max-w-7xl mx-auto mt-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
          {{ session('success') }}
        </div>
      @endif

      @if (session('error'))
        <div class="max-w-7xl mx-auto mt-4 px-4 py-2 bg-red-100 text-red-700 rounded shadow">
          {{ session('error') }}
        </div>
      @endif

    </div>

    <div class="mb-8">
      <form method="POST" action="{{ route('admin.concerts.attachSinger') }}" class="flex items-center gap-2 py-4">
        @csrf
        <label for="attach_concert_id" class="font-medium">Concert:</label>
        <select name="concert_id" id="attach_concert_id" class="border rounded px-2 py-1">
          @foreach ($concerts as $concert)
            <option value="{{ $concert->id }}">{{ $concert->name }}</option>
          @endforeach
        </select>
        <label for="attach_singer_id" class="font-medium">Singer:</label>
        <select name="singer_id" id="attach_singer_id" class="border rounded px-2 py-1">
          @foreach ($singers as $singer)
            <option value="{{ $singer->id }}">{{ $singer->name }}</option>
          @endforeach
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Attach</button>
      </form>
    </div>

    <div class="bg-white shadow-md rounded-lg">
      <div class="overflow-x-auto">
        <table class="min-w-full table-auto text-sm text-left text-gray-700">
          <thead class="bg-gray-100 text-gray-800 font-semibold uppercase tracking-wider">
            <tr>
              <th class="px-6 py-3 border-b uppercase">ID</th>
              <th class="px-6 py-3 border-b uppercase">Name</th>
              <th class="px-6 py-3 border-b uppercase">Description</th>
              <th class="px-6 py-3 border-b uppercase">Date</th>
              <th class="px-6 py-3 border-b uppercase">Singers</th>
              <th class="px-6 py-3 border-b uppercase">Image</th>
              <th class="px-6 py-3 border-b uppercase">Venue</th>
              <th class="px-6 py-3 border-b uppercase">Created At</th>
              <th class="px-6 py-3 border-b uppercase">Updated At</th>
              <th class="px-6 py-3 border-b text-center uppercase">Actions</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            @forelse ($concerts as $concert)
              <tr class="hover:bg-gray-50 transition">
                <td class="px-6 py-4">{{ $concert->id }}</td>
                <td class="px-6 py-4">{{ $concert->name }}</td>
                <td class="px-6 py-4 overflow-auto">{{ $concert->description }}</td>
                <td class="px-6 py-4">{{ $concert->date }}</td>
                <td class="px-6 py-4">
                  @if ($concert->singers->count())
                    <ul class="list-disc pl-4">
                      @foreach ($concert->singers as $singer)
                        <li class="flex items-center justify-between">
                          <span>{{ $singer->name }}</span>
                          <form method="POST" action="{{ route('admin.concerts.detachSinger') }}" class="inline-block ml-2">
                            @csrf
                            <input type="hidden" name="concert_id" value="{{ $concert->id }}">
                            <input type="hidden" name="singer_id" value="{{ $singer->id }}">
                            <button type="submit" class="text-red-500 hover:text-red-700 text-sm ml-2 cursor-pointer" title="Detach">&times;</button>
                          </form>
                        </li>
                      @endforeach
                    </ul>
                  @else
                    <span class="text-gray-400">No singers</span>
                  @endif
                </td>
                <td class="px-6 py-4 overflow-auto"><img src="{{ $concert->image }}" alt="Singer image" class="w-18 h-auto"></td>
                <td class="px-6 py-4">{{ $concert->venue->name }}</td>
                <td class="px-6 py-4">{{ $concert->created_at }}</td>
                <td class="px-6 py-4">{{ $concert->updated_at }}</td>
                <td class="px-6 py-4 flex justify-center gap-2">
                  <button
                          class="edit-btn inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm cursor-pointer"
                          data-id="{{ $concert->id }}"
                          data-name="{{ $concert->name }}"
                          data-description="{{ $concert->description }}"
                          data-date="{{ $concert->date }}"
                          data-image="{{ $concert->image }}"
                          data-venueId="{{ $concert->venue->id }}">
                    Edit
                  </button>
                  <form action="{{ route('admin.concerts.destroy', $concert->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
                <td colspan="4" class="px-6 py-4 text-center text-gray-500">No concerts found.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('admin.concerts.form')
@endsection
