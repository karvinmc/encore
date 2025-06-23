@extends('layouts.default')
@section('title', 'Encore | ' . $genre)

@section('content')

  <section
           class="flex items-center justify-center relative bg-cover bg-no-repeat min-h-[400px] px-4 sm:px-8 lg:px-16 py-16"
           style="background-image: url('/img/concerts/placeholder.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="relative w-full max-w-6xl mx-auto">
      <p class="text-xl font-semibold text-white uppercase">{{ $genre }}</p>
      <h2 class="text-4xl tracking-tight font-bold text-white mb-1">Concerts</h2>
    </div>
  </section>

  <section id="concerts" class="bg-white mx-10 py-16 lg:px-6 border-b border-gray-400">
    <div class="max-w-6xl mx-auto">
      @include('components.filter')
    </div>
    <div class="flex mx-auto max-w-6xl gap-2 py-16">
      <h2 class="text-2xl font-bold tracking-tight text-black">
        Concerts
      </h2>
      <h2 class="text-2xl tracking-tight text-black">
        • Showing {{ $concerts->count() }} results
      </h2>
    </div>
    @include('components.concert-card')
  </section>
@endsection
