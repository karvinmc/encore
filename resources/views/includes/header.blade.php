<nav class="bg-black text-white sticky md:relative top-0 z-50">
  <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="py-5 px-2 text-xl font-bold">Encore</a>

    <!-- Mobile menu icon -->
    <button id="menu-btn" class="md:hidden flex items-center cursor-pointer">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>

    <!-- Navigation Links -->
    <div id="nav-menu" class="hidden md:flex flex-col md:flex-row items-center md:space-x-4 absolute md:static top-full left-0 w-full md:w-auto bg-black md:bg-transparent z-50 shadow-md md:shadow-none p-4 md:p-0 transition-all">
      <a href="{{ url('/') }}" class="py-2 px-3 block transition">Home</a>
      <a href="{{ url('/concerts') }}" class="py-2 px-3 block">Concerts</a>
      <a href="{{ url('#') }}" class="py-2 px-3 block">Blog</a>
      <a href="{{ url('/signin') }}" class="block md:hidden mt-2 py-4 px-3 text-white">Sign in</a>
    </div>

    <!-- Sign in button -->
    <div class="hidden md:flex items-center px-2">
      <a href="/signin" class="py-2 px-4 rounded bg-sky-600 hover:bg-sky-500 transition text-white">Sign in</a>
    </div>
  </div>
</nav>

<script>
  const menuBtn = document.getElementById("menu-btn");
  const navMenu = document.getElementById("nav-menu");
  menuBtn.addEventListener("click", () => {
    navMenu.classList.toggle("hidden");
  });
</script>
