@extends('layouts.default')
@section('title', 'Sign Up')

@section('content')

  <section class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-center text-gray-800">Create an account</h2>
      <form method="POST" action="{{ route('register') }}" class="space-y-4">
        @csrf
        <div>
          <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
          <input
                 id="name"
                 name="name"
                 type="text"
                 value="{{ old('name') }}"
                 required
                 class="w-full px-4 py-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-sky-500" />
          @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
                 id="email"
                 name="email"
                 type="email"
                 value="{{ old('email') }}"
                 required
                 class="w-full px-4 py-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-sky-500" />
          @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
                 id="password"
                 name="password"
                 type="password"
                 required
                 class="w-full px-4 py-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-sky-500" />
          @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
          <input
                 id="password_confirmation"
                 name="password_confirmation"
                 type="password"
                 required
                 class="w-full px-4 py-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-sky-500" />
        </div>
        <button
                type="submit"
                class="w-full px-4 py-2 font-semibold text-white bg-sky-600 rounded hover:bg-sky-500 cursor-pointer">
          Sign Up
        </button>
      </form>
      <p class="text-sm text-center text-gray-600">
        Already have an account?
        <a href="/signin" class="text-sky-600 hover:underline">Sign in</a>
      </p>
    </div>
  </section>

@endsection
