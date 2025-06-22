<div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="VIP" data-price="3500000">

  {{-- Left --}}
  <div class="flex-1 py-5 justify-between">
    <div>
      <h2 class="text-lg text-gray-500">VIP</h2>
      <p class="text-lg text-black">Price IDR 3.500.000</p>
    </div>
  </div>

  {{-- Right --}}
  <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">

    {{-- Quantity Selector --}}
    <div class="flex items-center space-x-2 border rounded px-2 py-1">
      <button class="decrement text-gray-600 hover:text-black cursor-pointer">-</button>
      <span class="quantity w-6 text-center">0</span>
      <button class="increment text-gray-600 hover:text-black cursor-pointer">+</button>
    </div>
  </div>
</div>
