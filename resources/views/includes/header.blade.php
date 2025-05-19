<nav class="bg-black text-white relative">
  <div class="container mx-auto px-4 flex items-center justify-between">
    {{-- Logo --}}
    <a href="#" class="py-5 px-2 text-xl font-bold">Encore</a>

    {{-- Mobile menu icon --}}
    <button id="menu-btn" class="md:hidden flex items-center cursor-pointer">
      <i class="fa-solid fa-bars text-xl"></i>
    </button>

    {{-- Navigation Links --}}
    <div id="nav-menu" class="hidden md:flex flex-col md:flex-row items-center md:space-x-4 absolute md:static top-full left-0 w-full md:w-auto bg-black md:bg-transparent z-50 shadow-md md:shadow-none p-4 md:p-0 transition-all">
      <a href="{{ url('/') }}" class="py-2 px-3 block transition">Home</a>
      <a href="{{ url('#') }}" class="py-2 px-3 block">Concerts</a>
      <a href="{{ url('#') }}" class="py-2 px-3 block">About</a>
      <a href="#" class="block md:hidden mt-2 py-4 px-3 text-white">Sign in</a>
    </div>

    {{-- Mobile Sign in button --}}

    {{-- User profile --}}
    <div class="hidden md:flex flex-col md:flex-row items-center px-2">
      <a href="#" class="py-2 px-4 rounded bg-sky-600 hover:bg-sky-500 transition text-white">Sign in</a>
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
