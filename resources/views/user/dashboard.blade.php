<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Dashboard</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-6">
                <h2 class="text-lg font-medium text-blue-800 mb-2">Pemesanan Aktif</h2>
                <p class="text-3xl font-bold text-blue-600">{{ $activeBookings }}</p>
            </div>
            
            <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                <h2 class="text-lg font-medium text-green-800 mb-2">Total Pemesanan</h2>
                <p class="text-3xl font-bold text-green-600">{{ count($bookings) }}</p>
            </div>
        </div>
        <div class="mb-6">
            <h2 class="text-xl font-medium text-gray-800 mb-4">Pemesanan Terbaru</h2>
            
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr class="text-left text-gray-700">
                            <th class="border border-gray-300 px-4 py-2">Kamar</th>
                            <th class="border border-gray-300 px-4 py-2">Check-in</th>
                            <th class="border border-gray-300 px-4 py-2">Check-out</th>
                            <th class="border border-gray-300 px-4 py-2">Status</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings->take(5) as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-300 px-4 py-2">{{ $booking->room->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <span class="px-3 py-1 rounded-full text-white 
                                    {{ $booking->status == 'pending' ? 'bg-yellow-500' : 
                                       ($booking->status == 'confirmed' ? 'bg-green-500' : 
                                       ($booking->status == 'rejected' ? 'bg-red-500' : 
                                       ($booking->status == 'completed' ? 'bg-gray-500' : ''))) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="#" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 inline-block">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        
                        @if(count($bookings) == 0)
                        <tr>
                            <td colspan="5" class="border border-gray-300 px-4 py-4 text-center text-gray-500">
                                Anda belum memiliki pemesanan.
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            @if(count($bookings) > 5)
            <div class="mt-4 text-right">
                <a href="{{ route('user.bookings.index') }}" class="text-blue-600 hover:underline">
                    Lihat Semua Pemesanan
                </a>
            </div>
            @endif
        </div>
        
        <div>
            <h2 class="text-xl font-medium text-gray-800 mb-4">Kamar Rekomendasi</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recommendedRooms as $room)
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
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
                            <a href="#" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
                
                @if(count($recommendedRooms) == 0)
                <div class="md:col-span-3 py-8 text-center text-gray-500">
                    <p>Tidak ada kamar rekomendasi saat ini.</p>
                </div>
                @endif
            </div>
            
            <div class="mt-4 text-right">
                <a href="{{ route('user.rooms.index') }}" class="text-blue-600 hover:underline">
                    Lihat Semua Kamar
                </a>
            </div>
        </div>
    </div>
</x-app-layout>