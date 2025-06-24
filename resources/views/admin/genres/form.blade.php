<div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 {{ $errors->any() || old('show_modal') ? 'flex' : 'hidden' }}">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
    <h2 id="modalTitle" class="text-xl font-semibold mb-4">Genre Form</h2>

    <form id="form" method="POST" action="{{ old('edit_id') ? route('admin.genres.update', old('edit_id')) : route('admin.genres.store') }}">
      @csrf
      <input type="hidden" name="_method" value="{{ old('edit_id') ? 'PUT' : 'POST' }}" id="formMethod">
      <input type="hidden" name="show_modal" value="1">
      <input type="hidden" name="edit_id" value="{{ old('edit_id') }}">

      <div class="mb-4">
        <label for="name" class="block mb-1 font-medium text-sm">Name</label>
        <input type="text" name="name" id="genreName"
               class="w-full px-4 py-2 border rounded" value="{{ old('name') }}">
        @error('name')
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
      const genre = {
        id: button.dataset.id,
        name: button.dataset.name,
      };
      openModal(genre);
    });
  });

  // If there are errors, open the modal and fill values
  @if ($errors->any())
    openModal({
      id: '{{ old('edit_id') }}',
      name: '{{ old('name') }}',
    });
  @endif

  function openModal(genre = null) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('form');
    const methodInput = document.getElementById('formMethod');
    const title = document.getElementById('modalTitle');
    const nameInput = document.getElementById('genreName');

    form.reset();
    methodInput.value = 'POST';

    if (genre && genre.id) {
      form.action = `{{ route('admin.genres.update', ':id') }}`.replace(':id', genre.id);
      methodInput.value = 'PUT';
      nameInput.value = genre.name || '';
    } else {
      form.action = "{{ route('admin.genres.store') }}";
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
  }
</script>
