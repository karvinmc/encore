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
        {{-- Item 1 --}}
        <div class="p-5">
          <a href="{{ url('/tickets/concert-name') }}" class="block group">
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
        {{-- Item 2 --}}
        <div class="p-5">
          <a href="{{ url('/tickets/concert-name') }}" class="block group">
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
        {{-- Item 3 --}}
        <div class="p-5">
          <a href="{{ url('/tickets/concert-name') }}" class="block group">
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
        {{-- Item 4 --}}
        <div class="p-5">
          <a href="{{ url('/tickets/concert-name') }}" class="block group">
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
    </div>
  </section>

  <section class="bg-white mx-10 py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center my-5">
      <h2 class="text-4xl tracking-tight font-extrabold text-black">
        Articles & Updates
      </h2>
    </div>
    <div class="mx-auto px-5 text-end">
      <a href="{{ url('/blogs') }}" class="text-sky-600 hover:underline">Discover more</a>
    </div>
    {{-- News cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-3">
      <div class="p-2">
        <a href="/blogs" class="block group">
          <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
            <img
                 src="{{ asset('img/concerts/placeholder.jpg') }}"
                 alt="Concert image"
                 class="w-full h-full object-cover" />
          </div>
          <div class="pt-4">
            <p class="text-gray-600">Guide</p>
            <h2 class="text-xl mt-1 font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
              Get Started on Encore
            </h2>
            <p class="text-gray-600 mt-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus vero, obcaecati fugit magnam ab magni?</p>
            <p class="text-sky-600 mt-8">Read more</p>
          </div>
        </a>
      </div>
      <div class="p-2">
        <a href="/blogs" class="block group">
          <div class="aspect-video overflow-hidden group-hover:scale-102 transition-transform duration-300 rounded">
            <img
                 src="{{ asset('img/concerts/placeholder.jpg') }}"
                 alt="Concert image"
                 class="w-full h-full object-cover" />
          </div>
          <div class="pt-4">
            <p class="text-gray-600">Guide</p>
            <h2 class="text-xl mt-1 font-semibold text-black group-hover:text-sky-600 transition-colors duration-200">
              What to Bring to a Concert?
            </h2>
            <p class="text-gray-600 mt-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel debitis minus, fuga neque quis eaque quidem laborum labore est aspernatur dolores aut similique error praesentium.</p>
            <p class="text-sky-600 mt-8">Read more</p>
          </div>
        </a>
      </div>
  </section>
@endsection
