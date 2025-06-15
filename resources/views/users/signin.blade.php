@extends('layouts.default')
@section('title', 'Sign In')

@section('content')

  <section class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold text-center text-gray-800">Sign in to your account</h2>
      <form class="space-y-4">
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input
                 id="email"
                 name="email"
                 type="email"
                 required
                 class="w-full px-4 py-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-sky-500" />
        </div>
        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <input
                 id="password"
                 name="password"
                 type="password"
                 required
                 class="w-full px-4 py-2 mt-1 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-sky-500" />
        </div>
        <div class="flex items-center justify-between">
          <label class="flex items-center space-x-2">
            <input type="checkbox" class="w-4 h-4 text-sky-600 border-gray-300 rounded focus:ring-sky-500" />
            <span class="text-sm text-gray-600">Remember me</span>
          </label>
          <a href="#" class="text-sm text-sky-600 hover:underline">Forgot password?</a>
        </div>
        <button
                type="submit"
                class="w-full px-4 py-2 font-semibold text-white bg-sky-600 rounded hover:bg-sky-500 cursor-pointer">
          Login
        </button>
      </form>
      <p class="text-sm text-center text-gray-600">
        Don't have an account?
        <a href="/signup" class="text-sky-600 hover:underline">Sign up</a>
      </p>
    </div>
  </section>

@endsection
