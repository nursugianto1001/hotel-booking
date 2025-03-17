<x-app-layout>
    <div class="max-w-4xl mx-auto py-8 px-6 bg-white shadow-lg rounded-xl">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Kamar</h1>

        <form action="{{ route('admin.rooms.update', $room->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PATCH')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Kamar</label>
                    <input type="text" name="name" value="{{ $room->name }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Tipe Kamar</label>
                    <input type="text" name="type" value="{{ $room->type }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" value="{{ $room->price }}" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('description', $room->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Fasilitas</label>
                <textarea name="facilities" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('facilities', $room->facilities) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    <option value="available" {{ $room->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="booked" {{ $room->status == 'booked' ? 'selected' : '' }}>Dipesan</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md shadow-md hover:bg-blue-700">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</x-app-layout>