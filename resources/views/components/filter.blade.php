<form method="GET" action="{{ route('concerts.search') }}">
  <div class="flex flex-col md:flex-row items-center bg-white border border-sky-600 rounded-lg w-full max-w-5xl mx-auto divide-y md:divide-y-0 md:divide-x">
    <div class="relative w-full md:w-2/4" id="date-dropdown-wrapper">

      <!-- Dropdown toggle -->
      <button type="button" id="date-dropdown-toggle" class="flex items-center justify-between gap-3 px-4 py-4 w-full cursor-pointer">
        <span class="flex items-center gap-3">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-sky-600">
            <path fill-rule="evenodd" d="M6.75 2.25A.75.75 0 0 1 7.5 3v1.5h9V3A.75.75 0 0 1 18 3v1.5h.75a3 3 0 0 1 3 3v11.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V7.5a3 3 0 0 1 3-3H6V3a.75.75 0 0 1 .75-.75Zm13.5 9a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5Z" clip-rule="evenodd" />
          </svg>
          <span class="text-sm text-gray-500 font-medium" id="date-display">All Dates</span>
        </span>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 transition-transform duration-200" id="dropdown-arrow">
          <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
        </svg>
      </button>

      <!-- Dropdown menu -->
      <div id="date-dropdown-menu"
           class="absolute z-50 bg-white border border-gray-200 shadow-xl rounded-lg mt-1 w-full p-4 space-y-3 transform transition-all duration-200 opacity-0 pointer-events-auto">
        <div class="flex items-center gap-2">
          <label class="text-sm text-gray-600 w-20">Start</label>
          <input name="start" type="date" class="w-full text-sm text-gray-600 bg-white outline-none border border-sky-200 focus:border-sky-500 rounded px-2 py-1 transition-colors" />
        </div>
        <div class="flex items-center gap-2">
          <label class="text-sm text-gray-600 w-20">End</label>
          <input name="end" type="date" class="w-full text-sm text-gray-600 bg-white outline-none border border-sky-200 focus:border-sky-500 rounded px-2 py-1 transition-colors" />
        </div>
      </div>

    </div>
    <div class="flex items-center gap-3 ps-4 pe-2 py-2 w-full">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6 text-sky-600">
        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Z" clip-rule="evenodd" />
      </svg>
      <input name="search" type="text" placeholder="Search by Artist, Event or Venue" class="outline-none bg-transparent placeholder-gray-500 text-sm w-full" />
      <button type="submit" class="bg-sky-600 rounded hover:bg-sky-500 text-white font-semibold px-4 py-2 cursor-pointer transition-colors">
        Search
      </button>
    </div>
  </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('date-dropdown-toggle');
    const menu = document.getElementById('date-dropdown-menu');
    const arrow = document.getElementById('dropdown-arrow');
    const dateDisplay = document.getElementById('date-display');
    const startInput = document.querySelector('input[name="start"]');
    const endInput = document.querySelector('input[name="end"]');

    if (toggle && menu) {
      let isOpen = false;

      toggle.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (isOpen) {
          closeDropdown();
        } else {
          openDropdown();
        }
      });

      function openDropdown() {
        isOpen = true;
        menu.classList.remove('pointer-events-none');
        arrow.style.transform = 'rotate(180deg)';

        // Use requestAnimationFrame to ensure proper timing
        requestAnimationFrame(() => {
          menu.classList.remove('opacity-0', 'scale-95');
          menu.classList.add('opacity-100', 'scale-100');
        });
      }

      function closeDropdown() {
        isOpen = false;
        menu.classList.add('pointer-events-none');
        arrow.style.transform = 'rotate(0deg)';
        menu.classList.remove('opacity-100', 'scale-100');
        menu.classList.add('opacity-0', 'scale-95');
      }

      // Close dropdown when clicking outside
      document.addEventListener('click', function(e) {
        if (!toggle.contains(e.target) && !menu.contains(e.target)) {
          closeDropdown();
        }
      });

      // Update display text when dates are selected
      function updateDateDisplay() {
        const startDate = startInput.value;
        const endDate = endInput.value;

        if (startDate && endDate) {
          dateDisplay.textContent = `${startDate} to ${endDate}`;
        } else if (startDate) {
          dateDisplay.textContent = `From ${startDate}`;
        } else if (endDate) {
          dateDisplay.textContent = `Until ${endDate}`;
        } else {
          dateDisplay.textContent = 'All Dates';
        }
      }

      startInput.addEventListener('change', updateDateDisplay);
      endInput.addEventListener('change', updateDateDisplay);
    }
  });
</script>
