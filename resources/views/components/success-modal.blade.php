@if (session('success'))
  <div id="success-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
    <div class="bg-white rounded-xl shadow-lg max-w-sm w-full p-6 space-y-4 text-center relative">
      <div class="flex items-center justify-center w-12 h-12 mx-auto bg-green-100 rounded-full">
        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M5 13l4 4L19 7" />
        </svg>
      </div>
      <h2 class="text-xl font-semibold text-gray-800">{{ session('success') }}</h2>
      <button id="close-modal"
              class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-sky-600 text-white font-semibold rounded hover:bg-sky-500 transition cursor-pointer focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
        OK
      </button>
    </div>
  </div>

  <script>
    document.getElementById('close-modal').addEventListener('click', function() {
      document.getElementById('success-modal').remove();
    });
  </script>
@endif
