<div id="modal" class="fixed inset-0 bg-black/50 backdrop-blur-sm items-center justify-center z-50 {{ $errors->any() || old('show_modal') ? 'flex' : 'hidden' }}">
  <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
    <h2 id="modalTitle" class="text-xl font-semibold mb-4">
      @if (old('edit_id'))
        Edit User
      @elseif (old('show_modal'))
        Add User
      @else
        Add User
      @endif
    </h2>

    <form id="form" method="POST" action="{{ old('edit_id') ? route('admin.users.update', old('edit_id')) : route('admin.users.store') }}">
      @csrf
      <input type="hidden" name="_method" value="{{ old('edit_id') ? 'PUT' : 'POST' }}" id="formMethod">
      <input type="hidden" name="show_modal" value="1">
      <input type="hidden" name="edit_id" value="{{ old('edit_id') }}">

      <div class="mb-4">
        <label for="name" class="block mb-1 font-medium text-sm">Name</label>
        <input type="text" name="name" id="userName"
               class="w-full px-4 py-2 border rounded" value="{{ old('name') }}">
        @error('name')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="email" class="block mb-1 font-medium text-sm">Email</label>
        <input type="email" name="email" id="userEmail"
               class="w-full px-4 py-2 border rounded" value="{{ old('email') }}">
        @error('email')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="role" class="block mb-1 font-medium text-sm">Role</label>
        <select name="role" id="userRole" class="w-full px-3 py-2 border rounded">
          <option value=""></option>
          <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
          <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>
        @error('role')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="password" class="block mb-1 font-medium text-sm">Password</label>
        <input type="password" name="password"
               class="w-full px-4 py-2 border rounded">
        @error('password')
          <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
      </div>
      <div class="mb-4">
        <label for="confirm-password" class="block mb-1 font-medium text-sm">Confirm Password</label>
        <input type="password" name="password_confirmation"
               class="w-full px-4 py-2 border rounded">
        @error('password_confirmation')
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
      const user = {
        id: button.dataset.id,
        name: button.dataset.name,
        email: button.dataset.email,
        role: button.dataset.role,
      };
      openModal(user);
    });
  });

  // If there are errors, open the modal and fill values
  @if ($errors->any())
    openModal({
      id: '{{ old('edit_id') }}',
      name: '{{ old('name') }}',
      email: '{{ old('email') }}',
      role: '{{ old('role') }}',
    });
  @endif

  function openModal(user = null) {
    const modal = document.getElementById('modal');
    const form = document.getElementById('form');
    const methodInput = document.getElementById('formMethod');
    const title = document.getElementById('modalTitle');
    const nameInput = document.getElementById('userName');
    const emailInput = document.getElementById('userEmail');
    const roleInput = document.getElementById('userRole');

    form.reset();
    methodInput.value = 'POST';
    title.textContent = 'Add User';

    if (user && user.id) {
      title.textContent = 'Edit User';
      form.action = `{{ route('admin.users.update', ':id') }}`.replace(':id', user.id);
      methodInput.value = 'PUT';
      nameInput.value = user.name;
      emailInput.value = user.email;
      roleInput.value = user.role;
    } else {
      form.action = "{{ route('admin.users.store') }}";
    }

    modal.classList.remove('hidden');
    modal.classList.add('flex');
  }

  function closeModal() {
    document.getElementById('modal').classList.add('hidden');
    document.getElementById('modal').classList.remove('flex');
  }
</script>
