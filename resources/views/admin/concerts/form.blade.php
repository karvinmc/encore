<div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 {{ $errors->any() || old('show_modal') ? 'flex' : 'hidden' }}">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
    <h2 id="modalTitle" class="text-xl font-semibold mb-4">Concert Form</h2>

    <form id="form" method="POST" action="{{ old('edit_id') ? route('admin.singers.update', old('edit_id')) : route('admin.singers.store') }}">
      @csrf
      <input type="hidden" name="_method" value="{{ old('edit_id') ? 'PUT' : 'POST' }}" id="formMethod">
      <input type="hidden" name="show_modal" value="1">
      <input type="hidden" name="edit_id" value="{{ old('edit_id') }}">

      <div class="mb-4">
        <label for="name" class="block mb-1 font-medium text-sm">Name</label>
        <input type="text" name="name" id="concertName"
               class="w-full px-4 py-2 border rounded" value="{{ old('name') }}">
        @error('name')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="description" class="block mb-1 font-medium text-sm">Description</label>
        <textarea name="description" id="concertDescription"
                  class="w-full px-4 py-2 border rounded">{{ old('description') }}</textarea>
        @error('description')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="date" class="block mb-1 font-medium text-sm">Date</label>
        <input type="date" name="date" id="concertDate"
               class="w-full px-4 py-2 border rounded" value="{{ old('date') }}">
        @error('date')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="time" class="block mb-1 font-medium text-sm">Time</label>
        <input type="time" name="time" id="concertTime"
               class="w-full px-4 py-2 border rounded" value="{{ old('time') }}">
        @error('time')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="image" class="block mb-1 font-medium text-sm">Image (URL Only)</label>
        <input type="text" name="image" id="concertImage"
               class="w-full px-4 py-2 border rounded" value="{{ old('image') }}">
        @error('image')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="venue_id" class="block mb-1 font-medium text-sm">Venue</label>
        <select name="venue_id" id="concertVenue" class="px-3 py-2 border rounded w-full">
          <option value=""></option>
          @foreach ($venues as $venue)
            <option value="{{ $venue->id }}" {{ old('venue_id') == $venue->id ? 'selected' : '' }}>
              {{ $venue->name }}
            </option>
          @endforeach
        </select>
        @error('venue_id')
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
      const concert = {
        id: button.dataset.id,
        name: button.dataset.name,
        description: button.dataset.description,
        date: button.dataset.date,
        image: button.dataset.image,
        venue_id: button.dataset.venueId,
      };
      openModal(concert);
    });
  });

  // If there are errors, open the modal and fill values
  @if ($errors->any())
    openModal({
      id: '{{ old('edit_id') }}',
      name: `{{ old('name') }}`,
      description: `{{ old('description') }}`,
      date: `{{ old('date') }}`,
      image: `{{ old('image') }}`,
      venue_id: `{{ old('venue_id') }}`,
    });
  @endif

  function openModal(concert = null) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('form');
    const methodInput = document.getElementById('formMethod');
    const title = document.getElementById('modalTitle');
    const nameInput = document.getElementById('concertName');
    const descriptionInput = document.getElementById('concertDescription');
    const dateInput = document.getElementById('concertDate');
    const timeInput = document.getElementById('concertTime');
    const imageInput = document.getElementById('concertImage');
    const venueInput = document.getElementById('concertVenue');

    form.reset();
    methodInput.value = 'POST';

    if (concert && concert.id) {
      form.action = `{{ route('admin.concerts.update', ':id') }}`.replace(':id', concert.id);
      methodInput.value = 'PUT';
      nameInput.value = concert.name || '';
      descriptionInput.value = concert.description || '';
      // Format date and time for inputs
      if (concert.date) {
        let d = new Date(concert.date);
        if (!isNaN(d.getTime())) {
          let month = (d.getMonth() + 1).toString().padStart(2, '0');
          let day = d.getDate().toString().padStart(2, '0');
          dateInput.value = d.getFullYear() + '-' + month + '-' + day;
          let hours = d.getHours().toString().padStart(2, '0');
          let minutes = d.getMinutes().toString().padStart(2, '0');
          timeInput.value = hours + ':' + minutes;
        } else {
          // fallback if not a valid date
          dateInput.value = concert.date.split('T')[0] || '';
          timeInput.value = (concert.date.split('T')[1] || '').slice(0, 5);
        }
      } else {
        dateInput.value = '';
        timeInput.value = '';
      }
      imageInput.value = concert.image || '';
      venueInput.value = concert.venue_id || '';
    } else {
      form.action = "{{ route('admin.concerts.store') }}";
      dateInput.value = "{{ old('date') }}";
      timeInput.value = "{{ old('time') }}";
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
  }
</script>
