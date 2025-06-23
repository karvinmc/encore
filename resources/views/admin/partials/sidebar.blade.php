<aside class="w-64 bg-gradient-to-b from-black via-black to-yellow-400 text-white h-screen shadow-lg">
  <div class="p-6 text-left border-b border-white/20">
    <h2 class="text-xl font-semibold">{{ Auth::user()->name }}</h2>
    <p class="text-green-400 text-sm">Online</p>
  </div>

  <nav class="mt-6">
    <ul class="space-y-1 px-4">

      <!-- Dashboard Link -->
      <li>
        <a href="{{ url('admin/dashboard') }}"
           class="flex items-center gap-3 py-2 px-4 rounded hover:bg-white/10 transition duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none"
               viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
          </svg>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Tables Dropdown -->
      <li>
        <button onclick="toggleDropdown()"
                class="flex items-center justify-between w-full py-2 px-4 rounded hover:bg-white/10 transition duration-200 cursor-pointer">
          <div class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
              <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
            </svg>
            <span>Tables</span>
          </div>
          <svg id="arrow-icon" class="w-4 h-4 transition-transform duration-200 transform"
               xmlns="http://www.w3.org/2000/svg" fill="none"
               viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M19 9l-7 7-7-7" />
          </svg>
        </button>

        <ul id="dropdown-menu" class="mt-1 ml-8 space-y-1 hidden">
          <li>
            <a href="{{ url('admin/users') }}" class="block py-2 px-4 rounded hover:bg-white/10 transition duration-200">Users</a>
            <a href="" class="block py-2 px-4 rounded hover:bg-white/10 transition duration-200">Venues</a>
            <a href="" class="block py-2 px-4 rounded hover:bg-white/10 transition duration-200">Singers</a>
            <a href="" class="block py-2 px-4 rounded hover:bg-white/10 transition duration-200">Concerts</a>
            <a href="" class="block py-2 px-4 rounded hover:bg-white/10 transition duration-200">Tickets</a>
            <a href="" class="block py-2 px-4 rounded hover:bg-white/10 transition duration-200">Bookings</a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
</aside>

<script>
  function toggleDropdown() {
    const menu = document.getElementById('dropdown-menu');
    const arrow = document.getElementById('arrow-icon');

    menu.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
  }
</script>
