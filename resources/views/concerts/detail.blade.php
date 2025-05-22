@extends('layouts.default')
@section('title', 'Encore | Music Festival 2025')

@section('content')

  <section class="bg-white py-8 md:py-16">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-bold text-black">
        Music Festival 2025
      </h2>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 px-4 md:px-12">
      <div class="bg-white">
        <div class="overflow-hidden">
          <img
               src="{{ asset('img/concerts/placeholder2.jpg') }}"
               alt="Concert image"
               class="w-auto max-h-120 object-cover rounded" />
        </div>
        <div class="pt-4">
          <p class="flex items-center gap-2 text-black mb-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
            </svg>
            Jakarta, Indonesia
          </p>
          <p class="flex items-center gap-2 text-black">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-sky-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
            </svg>
            July 20, 2025
          </p>
        </div>
      </div>
      <div class="bg-gray-100">
        {{-- TODO: Content here --}}
      </div>
    </div>
  </section>

@endsection
