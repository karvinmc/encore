<header class="bg-gradient-to-r from-black via-yellow-400 to-black text-white px-6 py-4 flex justify-between items-center shadow-md">
  <div class="text-xl font-bold">Admin Dashboard</div>
  <div class="flex items-center gap-4">
    <div class="hidden md:flex items-center px-2">
      @auth
        <div class="relative group">
          <div class="flex items-center justify-center w-10 h-10 rounded-full bg-yellow-500 hover:bg-yellow-400 transition text-white cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
            </svg>
          </div>
          <div class="absolute right-0 w-48 bg-white text-black rounded-lg shadow-lg z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 ease-in-out" style="top: calc(100% + 0.5rem);">
            <div class="px-4 py-3 border-b border-gray-200">
              <p class="text-sm font-medium text-gray-900">{{ Auth::user()->name }}</p>
              <p class="text-sm text-gray-500">{{ Auth::user()->email }}</p>
            </div>

            <a href="{{ url('/') }}" class="block px-4 py-2 text-sm hover:bg-gray-100">
              <span class="font-medium">Home</span>
            </a>
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
  </div>
</header>
