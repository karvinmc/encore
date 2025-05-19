@extends('layouts.default')
@section('title', 'Encore | Home')

@section('content')

  {{-- Search bar --}}
  <section class="relative bg-cover bg-center bg-no-repeat min-h-[600px] flex items-center justify-center px-4 sm:px-8 lg:px-16 py-16">
    <div class="absolute inset-0 bg-black opacity-70"></div>
    <div class="relative text-center w-full max-w-6xl mx-auto">
      <h1 class="mb-8 text-4xl font-extrabold text-white md:text-5xl lg:text-6xl tracking-tight">
        Book your concert now!
      </h1>
      <div class="flex flex-col md:flex-row items-center bg-white border border-sky-600 rounded-lg shadow-lg overflow-hidden w-full max-w-5xl mx-auto">
        <div class="flex items-center gap-3 px-5 py-4 border-b md:border-b-0 md:border-r w-full">
          <i class="fa-solid fa-location-dot text-sky-600 text-lg"></i>
          <input type="text" placeholder="City" class="outline-none bg-transparent placeholder-gray-500 text-sm w-full font-medium" />
        </div>
        <div class="flex items-center justify-between gap-3 px-5 py-4 border-b md:border-b-0 md:border-r w-full cursor-pointer hover:bg-gray-100 transition-colors">
          <div class="flex items-center gap-3">
            <i class="fa-solid fa-calendar text-sky-600 text-lg"></i>
            <span class="text-sm text-gray-500 font-medium">All Dates</span>
          </div>
          <i class="fa-solid fa-chevron-down text-gray-500"></i>
        </div>
        <div class="flex items-center gap-3 px-5 py-4 w-full border-b md:border-b-0">
          <i class="fa-solid fa-magnifying-glass text-sky-600 text-lg"></i>
          <input type="text" placeholder="Search by Artist, Event or Venue" class="outline-none bg-transparent placeholder-gray-500 text-sm w-full font-medium" />
        </div>
        <div class="flex items-end p-2">
          <button class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">
            Search
          </button>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900">
          Popular Concerts
        </h2>
      </div>
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-12 items-center justify-center">
        {{-- TODO: Concert Cards here.. --}}
      </div>
    </div>
  </section>
@stop
