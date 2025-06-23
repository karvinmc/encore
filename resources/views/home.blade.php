@extends('layouts.default')
@section('title', 'Encore | Home')

@section('content')

  {{-- Search bar --}}
  <section
           class="relative bg-cover bg-center bg-no-repeat min-h-[600px] flex items-center justify-center px-4 sm:px-8 lg:px-16 py-16"
           style="background-image: url('{{ asset('img/home/home-banner.jpg') }}')">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative text-center w-full max-w-6xl mx-auto">
      <h1 class="mb-8 text-4xl font-extrabold text-white md:text-5xl lg:text-6xl tracking-tight">
        Book your concert now!
      </h1>

      @include('components.filter')

    </div>
  </section>

  <section class="bg-white mx-10 py-16 lg:px-6 border-b border-gray-400">
    <div class="mx-auto max-w-screen-sm text-center my-5">
      <h2 class="text-4xl tracking-tight font-extrabold text-black">
        Popular Concerts
      </h2>
    </div>
    <div class="mx-auto px-5 text-end">
      <a href="{{ url('/concerts') }}" class="text-sky-600 hover:underline">See all concerts</a>
    </div>
    <div class="relative mx-auto">
      <div class="concert-cards">

        {{-- Concert items --}}
        @foreach ($concerts as $concert)
          <div class="p-5">
            <a href="{{ url('/tickets/' . $concert->id . '/book') }}" class="block group">
              <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
                <img
                     src="{{ $concert->image }}"
                     alt="Concert image"
                     class="w-full h-full object-cover" />
              </div>
              <div class="pt-4">
                <h2 class="text-xl font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
                  {{ $concert->name }}
                </h2>
                <p class="text-gray-600 mt-1">{{ $concert->venue->name }} • {{ $concert->venue->location }}</p>
                <p class="text-gray-600">{{ $concert->formatted_date }}</p>
              </div>
            </a>
          </div>
        @endforeach

      </div>
    </div>
  </section>

  <section class="bg-white mx-10 py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center my-5">
      <h2 class="text-4xl tracking-tight font-extrabold text-black">
        Trending Artists
      </h2>
    </div>
    <div class="mx-auto px-5 text-end">
      <a href="{{ url('/blogs') }}" class="text-sky-600 hover:underline">Discover more</a>
    </div>

    {{-- Singer cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-3 px-3">
      @foreach ($uniqueSingers as $singer)
        <div class="p-2">
          <a href="{{ url('/concerts/singer/' . $singer->id) }}" class="block group">
            <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
              <img
                   src="{{ $singer->image }}"
                   alt="Singer image"
                   class="w-full h-full object-cover" />
            </div>
            <div class="pt-4">
              <p class="text-gray-600">{{ $singer->genre->name }}</p>
              <h2 class="text-xl mt-1 font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
                {{ $singer->name }}
              </h2>
            </div>
          </a>
        </div>
      @endforeach

    </div>
  </section>

  @include('components.success-modal')

@endsection
