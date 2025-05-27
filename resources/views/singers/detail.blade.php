@extends('layouts.default')
@section('title', 'Encore | Music Festival 2025')

@section('content')

  <section
           class="flex items-center justify-center relative bg-cover bg-center bg-no-repeat min-h-[400px] px-4 sm:px-8 lg:px-16 py-16"
           style="background-image: url('{{ asset('img/concerts/placeholder.jpg') }}')">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-6xl mx-auto">
      <p class="text-xl font-semibold text-white">Pop</p>
      <h2 class="text-4xl tracking-tight font-bold text-white mb-1">Ed Sheeran Concerts</h2>
    </div>
  </section>

  <section class="bg-white">
    @include('includes.navbar')
    <div id="concerts" class="tab-content bg-white mx-auto py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="text-2xl tracking-tight text-black">
          Showing 1 results
        </h2>
      </div>

      {{-- Concert cards --}}
      <div class="flex bg-gray-100 max-w-5xl mx-auto mb-4 rounded">
        {{-- Left --}}
        <div class="flex flex-col justify-center bg-sky-600 text-white text-center px-4 py-6 w-28 rounded-l">
          <p class="text-xl font-bold">20<br>July</p>
        </div>

        {{-- Middle --}}
        <div class="flex-1 p-5 justify-between">
          <div>
            <h2 class="text-lg text-gray-500">SUN • 08:00 PM</h2>
            <p class="text-lg text-black">Gelora Bung Karno • Jakarta, Indonesia</p>
            <p class="text-lg text-gray-500">Ed Sheeran +-=÷x Tour 2025</p>
          </div>
        </div>

        {{-- Right --}}
        <div class="flex items-center px-5">
          <a href="/concerts/detail" class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">Book Now</a>
        </div>
      </div>
    </div>
    <div id="news" class="tab-content hidden">
      <p>News section content...</p>
    </div>
  </section>
@endsection
