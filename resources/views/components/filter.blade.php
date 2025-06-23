<div class="flex flex-col md:flex-row items-center bg-white border border-sky-600 rounded-lg overflow-hidden w-full max-w-5xl mx-auto divide-y md:divide-y-0 md:divide-x">
  <div class="relative w-full md:w-1/3" id="date-dropdown-wrapper">
    <div id="date-dropdown-toggle" class="flex items-center justify-between gap-3 px-4 py-4 w-full cursor-pointer hover:bg-gray-100 transition-colors">
      <div class="flex items-center gap-3">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-sky-600">
          <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
        </svg>
        <span class="text-sm text-gray-500 font-medium">All Dates</span>
      </div>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
      </svg>
    </div>
    <div id="date-dropdown-menu" class="hidden absolute z-10 bg-white border border-gray-200 shadow-lg rounded-lg mt-1 w-full p-4 space-y-3">
      <div class="flex items-center gap-2">
        <label class="text-sm text-gray-600 w-20">Start</label>
        <input type="date" class="w-full text-sm text-gray-600 bg-transparent outline-none border rounded px-2 py-1" />
      </div>
      <div class="flex items-center gap-2">
        <label class="text-sm text-gray-600 w-20">End</label>
        <input type="date" class="w-full text-sm text-gray-600 bg-transparent outline-none border rounded px-2 py-1" />
      </div>
    </div>
  </div>
  <div class="flex items-center gap-3 ps-4 pe-2 py-2 w-full">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-sky-600">
      <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
    </svg>
    <input type="text" placeholder="Search by Artist, Event or Venue" class="outline-none bg-transparent placeholder-gray-500 text-sm w-full font-medium" />
    <button class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer">
      Search
    </button>
  </div>
</div>
