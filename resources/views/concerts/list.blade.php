@extends('layouts.default')
@section('title', 'Encore | Concerts')

@section('content')

  <section class="bg-white mt-8 lg:mt-16">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-extrabold text-gray-900">
        Upcoming Concerts
      </h2>
    </div>

    {{-- Concert cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 md:px-12">
      <div class="p-2">
        <a href="/concerts/detail" class="block group">
          <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
            <img
                 src="{{ asset('img/concerts/placeholder.jpg') }}"
                 alt="Concert image"
                 class="w-full h-full object-cover" />
          </div>
          <div class="pt-4">
            <h2 class="text-xl font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
              Music Festival 2025
            </h2>
            <p class="text-gray-600 mt-1">Jakarta, Indonesia</p>
            <p class="text-gray-600">July 20, 2025</p>
          </div>
        </a>
      </div>
      <div class="p-2">
        <a href="/concerts/detail" class="block group">
          <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
            <img
                 src="{{ asset('img/concerts/placeholder2.jpg') }}"
                 alt="Concert image"
                 class="w-full h-full object-cover" />
          </div>
          <div class="pt-4">
            <h2 class="text-xl font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
              Music Festival 2025
            </h2>
            <p class="text-gray-600 mt-1">Jakarta, Indonesia</p>
            <p class="text-gray-600">July 20, 2025</p>
          </div>
        </a>
      </div>
    </div>
  </section>

@endsection
