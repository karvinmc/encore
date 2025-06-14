@extends('layouts.default')
@section('title', 'Encore | Concerts')

@section('content')

  <section class="bg-white mx-10 py-16 lg:px-6 border-b border-gray-400">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-extrabold text-black">
        Trending Now
      </h2>
    </div>

    {{-- Concert cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 md:px-12">
      <div class="p-2">
        <a href="singers/detail" class="block group">
          <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
            <img
                 src="{{ asset('img/singers/placeholder.jpg') }}"
                 alt="Concert image"
                 class="w-full h-full object-cover" />
          </div>
          <div class="pt-4">
            <h2 class="text-xl font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
              Ed Sheeran
            </h2>
            <p class="text-gray-600 mt-1">Pop</p>
          </div>
        </a>
      </div>
      <div class="p-2">
        <a href="#" class="block group">
          <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
            <img
                 src="{{ asset('img/singers/placeholder2.jpg') }}"
                 alt="Concert image"
                 class="w-full h-full object-cover" />
          </div>
          <div class="pt-4">
            <h2 class="text-xl font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
              Sabrina Carpenter
            </h2>
            <p class="text-gray-600 mt-1">Pop</p>
          </div>
        </a>
      </div>
    </div>
  </section>

  <section class="bg-white mx-10 pt-16 lg:px-6">
    <div class="max-w-7xl mx-auto px-4">
      @include('components.filter')
    </div>
  </section>

  <section class="bg-white mx-10 py-16">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-extrabold text-black mb-1">
        Upcoming Concerts
      </h2>
      <p class="text-xl tracking-tight">Showing 1 results</p>
    </div>

    @include('components.concert-card')
  </section>

@endsection
