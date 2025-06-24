<div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 {{ $errors->any() || old('show_modal') ? 'flex' : 'hidden' }}">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
    <h2 id="modalTitle" class="text-xl font-semibold mb-4">Booking Form</h2>

    <form id="form" method="POST" action="{{ old('edit_id') ? route('admin.bookings.update', old('edit_id')) : route('admin.bookings.store') }}">
      @csrf
      <input type="hidden" name="_method" value="{{ old('edit_id') ? 'PUT' : 'POST' }}" id="formMethod">
      <input type="hidden" name="show_modal" value="1">
      <input type="hidden" name="edit_id" value="{{ old('edit_id') }}">

      <div class="mb-4">
        <label for="user_id" class="block mb-1 font-medium text-sm">User</label>
        <select name="user_id" id="bookingUser" class="px-3 py-2 border rounded w-full">
          <option value=""></option>
          @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
              {{ $user->name }} ({{ $user->email }})
            </option>
          @endforeach
        </select>
        @error('user_id')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="ticket_id" class="block mb-1 font-medium text-sm">Ticket</label>
        <select name="ticket_id" id="bookingTicket" class="px-3 py-2 border rounded w-full">
          <option value=""></option>
          @foreach ($tickets as $ticket)
            <option value="{{ $ticket->id }}" data-price="{{ $ticket->price }}" {{ old('ticket_id') == $ticket->id ? 'selected' : '' }}>
              {{ $ticket->concert->name }} - {{ $ticket->section->name }} ({{ $ticket->price }})
            </option>
          @endforeach
        </select>
        @error('ticket_id')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="quantity" class="block mb-1 font-medium text-sm">Quantity</label>
        <input type="number" name="quantity" id="bookingQuantity" min="1" class="w-full px-4 py-2 border rounded" value="{{ old('quantity') }}">
        @error('quantity')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="status" class="block mb-1 font-medium text-sm">Status</label>
        <select name="status" id="bookingStatus" class="px-3 py-2 border rounded w-full">
          <option value="paid" {{ old('status') == 'paid' ? 'selected' : '' }}>Paid</option>
          <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
          <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
        @error('status')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="total_price" class="block mb-1 font-medium text-sm">Total Price</label>
        <input type="text" id="bookingTotalPrice" class="w-full px-4 py-2 border rounded bg-gray-100" value="" readonly>
      </div>

      <div class="flex justify-end gap-2 mt-6">
        <button type="button" onclick="closeModal()"
                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 cursor-pointer">
          Cancel
        </button>
        <button type="submit"
                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 cursor-pointer">
          Save
        </button>
      </div>
    </form>

    <button onclick="closeModal()"
            class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl font-bold cursor-pointer">&times;</button>
  </div>
</div>

<script>
  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', () => {
      const booking = {
        id: button.dataset.id,
        user_id: button.dataset.userId,
        ticket_id: button.dataset.ticketId,
        quantity: button.dataset.quantity,
        status: button.dataset.status,
      };
      openModal(booking);
    });
  });

  // If there are errors, open the modal and fill values
  @if ($errors->any())
    openModal({
      id: '{{ old('edit_id') }}',
      user_id: `{{ old('user_id') }}`,
      ticket_id: `{{ old('ticket_id') }}`,
      quantity: `{{ old('quantity') }}`,
      status: `{{ old('status') }}`,
    });
  @endif

  function openModal(booking = null) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('form');
    const methodInput = document.getElementById('formMethod');
    const title = document.getElementById('modalTitle');
    const userInput = document.getElementById('bookingUser');
    const ticketInput = document.getElementById('bookingTicket');
    const quantityInput = document.getElementById('bookingQuantity');
    const statusInput = document.getElementById('bookingStatus');
    const totalPriceInput = document.getElementById('bookingTotalPrice');

    form.reset();
    methodInput.value = 'POST';

    if (booking && booking.id) {
      form.action = `{{ route('admin.bookings.update', ':id') }}`.replace(':id', booking.id);
      methodInput.value = 'PUT';
      userInput.value = booking.user_id || '';
      ticketInput.value = booking.ticket_id || '';
      quantityInput.value = booking.quantity || '';
      statusInput.value = booking.status || '';
    } else {
      form.action = "{{ route('admin.bookings.store') }}";
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
  }

  function updateTotalPrice() {
    const ticketSelect = document.getElementById('bookingTicket');
    const quantityInput = document.getElementById('bookingQuantity');
    const totalPriceInput = document.getElementById('bookingTotalPrice');
    const selectedOption = ticketSelect.options[ticketSelect.selectedIndex];
    const price = selectedOption ? parseFloat(selectedOption.getAttribute('data-price')) : 0;
    const quantity = parseInt(quantityInput.value) || 0;
    totalPriceInput.value = price && quantity ? (price * quantity).toFixed(2) : '';
  }
  document.getElementById('bookingTicket').addEventListener('change', updateTotalPrice);
  document.getElementById('bookingQuantity').addEventListener('input', updateTotalPrice);
  document.addEventListener('DOMContentLoaded', updateTotalPrice);
</script>
