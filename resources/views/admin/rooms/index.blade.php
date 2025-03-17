<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Kamar</h1>

        <!-- Form Tambah Kamar -->
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data" class="mb-6 bg-gray-100 p-4 rounded-md shadow-sm">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Nama Kamar" required class="border-gray-300 rounded-md p-2">
                <input type="number" name="price" placeholder="Harga" required class="border-gray-300 rounded-md p-2">
                <select name="status" required class="border-gray-300 rounded-md p-2">
                    <option value="available">Tersedia</option>
                    <option value="booked">Dipesan</option>
                </select>
                <textarea name="description" placeholder="Deskripsi" class="border-gray-300 rounded-md p-2 col-span-2"></textarea>
                <textarea name="facilities" placeholder="Fasilitas" class="border-gray-300 rounded-md p-2 col-span-2"></textarea>
                <input type="file" name="image" class="border-gray-300 rounded-md p-2 col-span-2">
            </div>
            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                Tambah Kamar
            </button>
        </form>

        <!-- Tabel Kamar -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">Nama</th>
                        <th class="border border-gray-300 px-4 py-2">Gambar</th>
                        <th class="border border-gray-300 px-4 py-2">Harga</th>
                        <th class="border border-gray-300 px-4 py-2">Deskripsi</th>
                        <th class="border border-gray-300 px-4 py-2">Fasilitas</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rooms as $room)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $room->name }}</td>

                        <!-- Kolom Gambar -->
                        <td class="border border-gray-300 px-4 py-2">
                            @if ($room->image)
                            <img src="{{ asset('storage/' . $room->image) }}" alt="Gambar {{ $room->name }}" class="w-20 h-20 object-cover rounded">
                            @else
                            <span class="text-gray-500">Tidak ada gambar</span>
                            @endif
                        </td>

                        <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($room->price, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $room->description }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $room->facilities }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-white {{ $room->status == 'available' ? 'bg-green-500' : 'bg-red-500' }}">
                                {{ ucfirst($room->status) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <a href="{{ route('admin.rooms.edit', $room->id) }}"
                                class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600">Edit</a>

                            <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>