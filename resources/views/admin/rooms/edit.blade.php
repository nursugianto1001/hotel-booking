<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Edit Kamar</h1>

        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="name" value="{{ old('name', $room->name) }}" required class="border-gray-300 rounded-md p-2">
                <input type="number" name="price" value="{{ old('price', $room->price) }}" required class="border-gray-300 rounded-md p-2">
                
                <select name="status" required class="border-gray-300 rounded-md p-2">
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Dipesan</option>
                </select>

                <textarea name="description" class="border-gray-300 rounded-md p-2 col-span-2">{{ old('description', $room->description) }}</textarea>
                <textarea name="facilities" class="border-gray-300 rounded-md p-2 col-span-2">{{ old('facilities', $room->facilities) }}</textarea>
                
                <input type="file" name="image" class="border-gray-300 rounded-md p-2 col-span-2">
                
                @if ($room->image)
                    <div class="col-span-2">
                        <p>Gambar Saat Ini:</p>
                        <img src="{{ asset('storage/' . $room->image) }}" class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
            </div>

            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </form>
    </div>
</x-app-layout>
