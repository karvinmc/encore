<div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 {{ $errors->any() || old('show_modal') ? 'flex' : 'hidden' }}">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
    <h2 id="modalTitle" class="text-xl font-semibold mb-4">Ticket Form</h2>

    <form id="form" method="POST" action="{{ old('edit_id') ? route('admin.tickets.update', old('edit_id')) : route('admin.tickets.store') }}">
      @csrf
      <input type="hidden" name="_method" value="{{ old('edit_id') ? 'PUT' : 'POST' }}" id="formMethod">
      <input type="hidden" name="show_modal" value="1">
      <input type="hidden" name="edit_id" value="{{ old('edit_id') }}">

      <div class="mb-4">
        <label for="concert_id" class="block mb-1 font-medium text-sm">Concert</label>
        <select name="concert_id" id="concert" class="px-3 py-2 border rounded w-full" onchange="filterSectionsByConcert()">
          <option value=""></option>
          @foreach ($concerts as $concert)
            <option value="{{ $concert->id }}" data-venue="{{ $concert->venue_id }}" {{ old('concert_id') == $concert->id ? 'selected' : '' }}>
              {{ $concert->name }}
            </option>
          @endforeach
        </select>
        @error('concert_id')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="venue_section_id" class="block mb-1 font-medium text-sm">Section</label>
        <select name="venue_section_id" id="section" class="px-3 py-2 border rounded w-full">
          <option value=""></option>
          @foreach ($sections as $section)
            <option value="{{ $section->id }}" data-venue="{{ $section->venue_id }}" {{ old('venue_section_id') == $section->id ? 'selected' : '' }}>
              {{ $section->name }}
            </option>
          @endforeach
        </select>
        @error('venue_section_id')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="price" class="block mb-1 font-medium text-sm">Price</label>
        <input type="number" name="price" id="ticketPrice"
               class="w-full px-4 py-2 border rounded" value="{{ old('price') }}">
        @error('price')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="stock" class="block mb-1 font-medium text-sm">Stock</label>
        <input type="number" name="stock" id="ticketStock"
               class="w-full px-4 py-2 border rounded" value="{{ old('stock') }}">
        @error('stock')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
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
      const ticket = {
        id: button.dataset.id,
        concert_id: button.dataset.concertId,
        venue_section_id: button.dataset.sectionId,
        price: button.dataset.price,
        stock: button.dataset.stock,
      };
      openModal(ticket);
    });
  });

  // If there are errors, open the modal and fill values
  @if ($errors->any())
    openModal({
      id: '{{ old('edit_id') }}',
      concert_id: `{{ old('concert_id') }}`,
      venue_section_id: `{{ old('venue_section_id') }}`,
      price: `{{ old('price') }}`,
      stock: `{{ old('stock') }}`,
    });
  @endif

  function openModal(ticket = null) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('form');
    const methodInput = document.getElementById('formMethod');
    const concertInput = document.getElementById('concert');
    const sectionInput = document.getElementById('section');
    const priceInput = document.getElementById('ticketPrice');
    const stockInput = document.getElementById('ticketStock');

    form.reset();
    methodInput.value = 'POST';

    if (ticket && ticket.id) {
      form.action = `{{ route('admin.tickets.update', ':id') }}`.replace(':id', ticket.id);
      methodInput.value = 'PUT';
      concertInput.value = ticket.concert_id || '';
      filterSectionsByConcert();
      sectionInput.value = ticket.venue_section_id || '';
      priceInput.value = ticket.price || '';
      stockInput.value = ticket.stock || '';
    } else {
      form.action = "{{ route('admin.tickets.store') }}";
      filterSectionsByConcert();
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
  }

  function filterSectionsByConcert() {
    const concertSelect = document.getElementById('concert');
    const sectionSelect = document.getElementById('section');
    const selectedConcert = concertSelect.options[concertSelect.selectedIndex];
    const selectedVenue = selectedConcert ? selectedConcert.getAttribute('data-venue') : null;
    Array.from(sectionSelect.options).forEach(option => {
      if (!option.value) return; // skip placeholder
      const venueId = option.getAttribute('data-venue');
      option.style.display = (venueId === selectedVenue) ? '' : 'none';
    });
    // Optionally, reset section selection if not matching
    if (sectionSelect.selectedOptions.length && sectionSelect.selectedOptions[0].style.display === 'none') {
      sectionSelect.selectedIndex = 0;
    }
  }
  // Run on page load if old('concert_id') exists
  document.addEventListener('DOMContentLoaded', filterSectionsByConcert);
</script>
