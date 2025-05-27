@extends('layouts.default')
@section('title', 'Encore | Ed Sheeran Concerts')

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

  <section class="bg-white text-black sticky top-0 z-50 shadow-lg">
    <div class="max-w-6xl mx-auto">
      <div class="flex overflow-x-auto">
        <a href="#concerts"
           class="active tab-btn py-5 px-5 border-b-2 border-transparent text-gray-600 hover:bg-gray-100 hover:text-black cursor-pointer">
          Concerts
        </a>
        <a href="#about"
           class="tab-btn py-5 px-5 border-b-2 border-transparent text-gray-600 hover:bg-gray-100 hover:text-black cursor-pointer">
          About
        </a>
      </div>
    </div>
  </section>

  <section id="about" class="bg-white mx-10 py-16 lg:px-6 border-b border-gray-400">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center bg-white border border-sky-600 rounded-lg overflow-hidden w-full max-w-3xl mx-auto">
        <div class="flex items-center gap-3 px-5 py-4 border-b md:border-b-0 md:border-r w-full">
          <svg
               xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 24 24"
               fill="currentColor"
               class="size-6 text-sky-600">
            <path
                  fill-rule="evenodd"
                  d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                  clip-rule="evenodd" />
          </svg>
          <input
                 type="text"
                 placeholder="City"
                 class="outline-none bg-transparent placeholder-gray-500 text-sm w-full font-medium" />
        </div>
        <div class="flex items-center justify-between gap-3 px-5 py-4 w-full cursor-pointer hover:bg-gray-100 transition-colors">
          <div class="flex items-center gap-3">
            <svg
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 24 24"
                 fill="currentColor"
                 class="size-6 text-sky-600">
              <path
                    fill-rule="evenodd"
                    d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z"
                    clip-rule="evenodd" />
            </svg>
            <span class="text-sm text-gray-500 font-medium">All Dates</span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
          </svg>

        </div>
        <div class="flex items-end p-2">
          <button class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">
            Search
          </button>
        </div>
      </div>

    </div>
    <div class="flex mx-auto max-w-6xl gap-2 py-16">
      <h2 class="text-2xl font-bold tracking-tight text-black">
        Concerts
      </h2>
      <h2 class="text-2xl tracking-tight text-black">
        • Showing 1 results
      </h2>
    </div>

    {{-- Concert cards --}}
    <div class="flex bg-gray-100 max-w-6xl mx-auto mb-4 rounded">
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
  </section>

  <section id="concerts" class="bg-white mx-auto py-5 lg:px-6">
    <div class="flex flex-col mx-auto max-w-6xl gap-10 py-16">
      <h2 class="text-2xl font-bold tracking-tight text-black">
        About
      </h2>

      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Tenetur, qui sequi saepe odit eum ullam cum est omnis enim cupiditate sunt voluptatum dicta vitae corrupti soluta aliquid asperiores nesciunt reiciendis.
      </p>
    </div>
  </section>
@endsection
