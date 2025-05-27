<div class="flex flex-col md:flex-row items-center bg-white border border-sky-600 rounded-lg overflow-hidden w-full max-w-5xl mx-auto">
  {{-- TODO: Filter function --}}
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
