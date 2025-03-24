<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Selamat Datang, {{ Auth::user()->name }}!</h1>


        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 text-white shadow-lg rounded-lg p-6 border border-blue-600">
                <h2 class="text-lg font-medium">Pemesanan Aktif</h2>
                <p class="text-4xl font-bold mt-2">{{ $activeBookings }}</p>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-green-700 text-white shadow-lg rounded-lg p-6 border border-green-600">
                <h2 class="text-lg font-medium">Total Pemesanan</h2>
                <p class="text-4xl font-bold mt-2">{{ count($bookings) }}</p>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-300 mb-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Pemesanan Terbaru</h2>
            <div class="overflow-x-auto">
                <table class="w-full table-auto border-collapse">
                    <thead class="bg-blue-100 text-blue-800">
                        <tr>
                            <th class="px-4 py-2 text-left">Kamar</th>
                            <th class="px-4 py-2 text-left">Check-in</th>
                            <th class="px-4 py-2 text-left">Check-out</th>
                            <th class="px-4 py-2 text-left">Status</th>
                            <th class="px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings->take(5) as $booking)
                        <tr class="border-b hover:bg-blue-50">
                            <td class="px-4 py-3">{{ $booking->room->name }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-white text-sm {{ $booking->status == 'pending' ? 'bg-yellow-500' : ($booking->status == 'confirmed' ? 'bg-green-500' : ($booking->status == 'rejected' ? 'bg-red-500' : ($booking->status == 'completed' ? 'bg-gray-500' : ''))) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('user.bookings.show', $booking->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700">Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div>
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Kamar Rekomendasi</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recommendedRooms as $room)
                <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-gray-300 hover:shadow-2xl transition duration-300">
                    <div class="h-48 bg-gray-300 flex items-center justify-center">
                        @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="object-cover w-full h-full">
                        @else
                        <span class="text-gray-400">No Image</span>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $room->name }}</h3>
                        <p class="text-gray-600 mb-4 h-12 overflow-hidden">{{ Str::limit($room->description, 80) }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-lg font-bold text-blue-600">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                            <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">Available</span>
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('user.rooms.show', $room->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @if(count($recommendedRooms) == 0)
    <div class="md:col-span-3 py-8 text-center text-gray-500">
        <p>Tidak ada kamar rekomendasi saat ini.</p>
    </div>
    @endif

    <div class="mt-4 text-right">
        <a href="{{ route('user.rooms.index') }}" class="text-blue-600 hover:underline">
            Lihat Semua Kamar
        </a>
    </div>
</x-app-layout>