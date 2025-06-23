@extends('layouts.admin')
@section('title', 'Users')

@section('content')
  <div class="p-6">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-semibold text-gray-800">Users</h1>
      <button onclick="openModal()"
              class="inline-flex items-center gap-2 bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
             stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
        </svg>
        Add User
      </button>
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
            <th class="px-6 py-3 border-b">ID</th>
            <th class="px-6 py-3 border-b">Name</th>
            <th class="px-6 py-3 border-b">Email</th>
            <th class="px-6 py-3 border-b">Role</th>
            <th class="px-6 py-3 border-b text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse ($users as $user)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4">{{ $user->id }}</td>
              <td class="px-6 py-4">{{ $user->name }}</td>
              <td class="px-6 py-4">{{ $user->email }}</td>
              <td class="px-6 py-4">{{ $user->role }}</td>
              <td class="px-6 py-4 flex justify-center gap-2">
                <button
                        class="edit-btn inline-flex items-center px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition text-sm cursor-pointer"
                        data-id="{{ $user->id }}"
                        data-name="{{ $user->name }}"
                        data-email="{{ $user->email }}"
                        data-role="{{ $user->role }}">
                  Edit
                </button>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
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
              <td colspan="4" class="px-6 py-4 text-center text-gray-500">No users found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  @include('admin.users.form')
@endsection
