@foreach ($tickets as $ticket)
  <div class="ticket-card flex bg-white max-w-6xl mx-auto mb-4 border-b" data-ticket-type="{{ $ticket->section->name }}" data-price="{{ $ticket->price }}">

    {{-- Left --}}
    <div class="flex-1 py-5 justify-between">
      <div>
        <h2 class="text-lg text-gray-500">{{ $ticket->section->name }}</h2>
        <p class="text-lg text-black">Price IDR {{ number_format($ticket->price, 0, ',', '.') }}</p>
      </div>
    </div>

    {{-- Right --}}
    <div class="flex flex-col gap-8 items-center justify-center px-5 space-y-2">

      @if ($ticket->stock > 0)
        {{-- Quantity Selector --}}
        <div class="flex items-center space-x-2 border rounded px-2 py-1">
          <button class="decrement text-gray-600 hover:text-black cursor-pointer">-</button>
          <span class="quantity w-6 text-center">0</span>
          <button class="increment text-gray-600 hover:text-black cursor-pointer">+</button>
        </div>
      @else
        <span class="text-red-500 font-semibold">Sold Out</span>
      @endif

    </div>
  </div>
@endforeach
