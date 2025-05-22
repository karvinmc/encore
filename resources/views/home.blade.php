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
      <div class="flex flex-col md:flex-row items-center bg-white border border-sky-600 rounded-lg shadow-lg overflow-hidden w-full max-w-5xl mx-auto">
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
        <div class="flex items-center justify-between gap-3 px-5 py-4 border-b md:border-b-0 md:border-r w-full cursor-pointer hover:bg-gray-100 transition-colors">
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
        <div class="flex items-center gap-3 px-5 py-4 w-full border-b md:border-b-0">
          <svg
               xmlns="http://www.w3.org/2000/svg"
               viewBox="0 0 24 24"
               fill="currentColor"
               class="size-6 text-sky-600">
            <path
                  fill-rule="evenodd"
                  d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z"
                  clip-rule="evenodd" />
          </svg>

          <input
                 type="text"
                 placeholder="Search by Artist, Event or Venue"
                 class="outline-none bg-transparent placeholder-gray-500 text-sm w-full font-medium" />
        </div>
        <div class="flex items-end p-2">
          <button class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">
            Search
          </button>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white mx-auto py-16 lg:px-6 border-b">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-12">
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
          <a href="{{ url('/concerts/detail') }}" class="block group">
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
          <a href="{{ url('/concerts/detail') }}" class="block group">
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
          <a href="{{ url('/concerts/detail') }}" class="block group">
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
          <a href="{{ url('/concerts/detail') }}" class="block group">
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

  <section class="bg-white mx-auto py-16 lg:px-6 border-b">
    <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
      <h2 class="text-4xl tracking-tight font-extrabold text-black">
        Articles & Updates
      </h2>
    </div>
    <div class="mx-auto px-5 text-end">
      <a href="{{ url('/concerts') }}" class="text-sky-600 hover:underline">Discover more</a>
    </div>
    {{-- News cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-3">
      <div class="p-2">
        <a href="/concerts/detail" class="block group">
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
        <a href="/concerts/detail" class="block group">
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
