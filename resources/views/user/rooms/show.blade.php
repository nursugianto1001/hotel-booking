<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Detail Kamar</h1>
            <a href="{{ route('user.rooms.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                Kembali
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2">
                <div class="bg-gray-200 rounded-lg overflow-hidden h-64 md:h-96 mb-6">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="object-cover w-full h-full">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            No Image Available
                        </div>
                    @endif
                </div>

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <h2 class="text-xl font-medium text-gray-800 mb-2">{{ $room->name }}</h2>
                    <div class="flex items-center text-sm mb-4">
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full">Available</span>
                        <span class="mx-2 text-gray-400">|</span>
                        <span class="text-gray-600">Harga per malam</span>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-blue-600 mb-4">Rp {{ number_format($room->price, 0, ',', '.') }}</h3>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Deskripsi</h3>
                        <p class="text-gray-600 mb-4">{{ $room->description }}</p>
                    </div>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <h3 class="text-lg font-medium text-gray-800 mb-2">Fasilitas</h3>
                        <p class="text-gray-600">{{ $room->facilities }}</p>
                    </div>
                </div>
            </div>
            
            <div>
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-200 sticky top-6">
                    <h2 class="text-xl font-medium text-gray-800 mb-4">Pesan Kamar Ini</h2>
                    
                    <div class="bg-gray-50 p-4 rounded-md mb-4">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Harga per malam</span>
                            <span class="font-bold">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                        </div>
                        <p class="text-sm text-gray-500">Harga belum termasuk pajak dan biaya layanan lainnya.</p>
                    </div>
                    
                    <div class="mb-4">
                        <a href="{{ route('user.bookings.create', $room->id) }}" class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 flex items-center justify-center">
                            Pesan Sekarang
                        </a>
                    </div>
                    
                    <div class="text-sm text-gray-600">
                        <p class="mb-1">Kebijakan pemesanan:</p>
                        <ul class="list-disc list-inside space-y-1">
                            <li>Check-in: Mulai pukul 14:00</li>
                            <li>Check-out: Sebelum pukul 12:00</li>
                            <li>Pembatalan dapat dilakukan sebelum tanggal check-in</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>