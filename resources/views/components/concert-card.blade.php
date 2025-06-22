@foreach ($concerts as $concert)
  <div class="flex bg-gray-100 max-w-5xl mx-auto mb-4 rounded">
    {{-- Left --}}
    <div class="flex flex-col justify-center bg-sky-600 text-white text-center px-4 py-6 w-28 rounded-l">
      <p class="text-xl font-bold">{{ $concert->day }}<br>{{ $concert->month }}</p>
    </div>

    {{-- Middle --}}
    <div class="flex-1 p-5 justify-between">
      <div>
        <h2 class="text-lg text-gray-500">{{ $concert->day_name }} • {{ $concert->time }}</h2>
        <p class="text-lg text-black">{{ $concert->name }}</p>
        <p class="text-lg text-gray-500">{{ $concert->venue->name }} • {{ $concert->venue->location }}</p>
      </div>
    </div>

    {{-- Right --}}
    <div class="flex items-center px-5">
      <a href="{{ url('/tickets/' . $concert->id . '/book') }}" class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">Book Now</a>
    </div>
  </div>
@endforeach
