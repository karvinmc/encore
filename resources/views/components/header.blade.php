<nav class="bg-black text-white sticky md:relative top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">
    <a href="{{ url('/') }}" class="py-5 px-2 text-xl font-bold">Encore</a>

    {{-- Navigation links --}}
    <div id="nav-menu" class="hidden md:flex flex-col md:flex-row items-center md:space-x-4 absolute md:static top-full left-0 w-full md:w-auto bg-black md:bg-transparent z-50 shadow-md md:shadow-none p-4 md:p-0 transition-all">

      {{-- Mobile user header --}}
      @auth
        <div class="block md:hidden w-full mb-4 pb-4 border-b border-gray-700">
          <div class="flex items-center space-x-3">
            <div class="flex items-center justify-center w-12 h-12 rounded-full bg-sky-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
              </svg>
            </div>
            <div>
              <p class="text-sm font-medium text-white">{{ Auth::user()->name }}</p>
              <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
            </div>
          </div>
        </div>
      @endauth

      {{-- Navigation links --}}
      <a href="{{ url('/') }}" class="py-2 px-3 block transition">Home</a>
      <a href="{{ url('/concerts') }}" class="py-2 px-3 block">Concerts</a>
      <a href="{{ url('/blogs') }}" class="py-2 px-3 block">Blog</a>

      @auth
        {{-- Mobile bookings/admin link --}}
        @if (Auth::user()->role === 'admin')
          <a href="{{ url('/admin/dashboard') }}" class="block md:hidden py-2 px-3 text-white">Admin Dashboard</a>
        @else
          <a href="{{ url('/bookings') }}" class="block md:hidden py-2 px-3 text-white">Bookings</a>
        @endif

        <form method="POST" action="{{ route('logout') }}" class="block md:hidden">
          @csrf
          <button type="submit" class="w-full text-left mt-5 py-2 px-3 text-red-400 cursor-pointer">Logout</button>
        </form>
      @else
        <a href="{{ url('/login') }}" class="block md:hidden py-4 px-3 text-white">Sign in</a>
      @endauth
    </div>

    {{-- Auth --}}
    <div class="hidden md:flex items-center px-2">
      @auth
        <div class="relative group">
          <div class="flex items-center justify-center w-10 h-10 rounded-full bg-sky-600 hover:bg-sky-500 transition text-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          </div>
          <div class="absolute right-0 w-48 bg-white text-black rounded-lg shadow-lg z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-in-out" style="top: calc(100% + 0.5rem);">
            <div class="px-4 py-3 border-b border-gray-200">
              <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
              <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>

            {{-- Desktop bookings/admin link --}}
            @if (Auth::user()->role === 'admin')
              <a href="{{ url('/admin/dashboard') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
                <span class="font-medium">Admin Dashboard</span>
              </a>
            @else
              <a href="{{ url('/bookings') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
                <span class="font-medium">Bookings</span>
              </a>
            @endif

            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="w-full text-left px-4 py-2 text-sm hover:bg-gray-100 rounded-b-lg cursor-pointer">
                <span class="font-medium text-red-600">Logout</span>
              </button>
            </form>
          </div>
        </div>
      @endauth
    </div>

    {{-- Mobile menu --}}
    <button id="menu-btn" class="md:hidden flex items-center cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
  </div>
</nav>

<script>
  const menuBtn = document.getElementById("menu-btn");
  const navMenu = document.getElementById("nav-menu");
  menuBtn.addEventListener("click", () => {
    navMenu.classList.toggle("hidden");
  });
</script>
