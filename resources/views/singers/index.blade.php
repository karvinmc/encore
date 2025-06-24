@extends('layouts.default')
@section('title', 'Singers')

@section('content')

  <section class="bg-white mx-10 py-16 lg:px-6">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-extrabold text-black">
        List of All Available Artists
      </h2>
    </div>

    {{-- Singer cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-3 px-3">
      @foreach ($singers as $singer)
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

    <div class="mt-8 flex ">
      {{ $singers->links() }}
    </div>

  </section>

@endsection
