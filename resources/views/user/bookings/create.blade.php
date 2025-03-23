<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Pesan Kamar</h1>
            <a href="{{ route('user.rooms.show', $room->id) }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                Kembali
            </a>
        </div>

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-2">
                    <h2 class="text-xl font-medium text-gray-800 mb-4">Form Pemesanan</h2>
                    
                    <form action="{{ route('user.bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="check_in" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Check-in</label>
                                <input type="date" name="check_in" id="check_in" value="{{ old('check_in') }}" 
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required min="{{ date('Y-m-d') }}">
                                @error('check_in')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="check_out" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Check-out</label>
                                <input type="date" name="check_out" id="check_out" value="{{ old('check_out') }}" 
                                    class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required min="{{ date('Y-m-d', strtotime('+1 day')) }}">
                                @error('check_out')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label for="guests" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Tamu</label>
                            <input type="number" name="guests" id="guests" value="{{ old('guests', 1) }}" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required min="1">
                            @error('guests')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="bg-blue-50 p-4 rounded-md mb-4">
                            <p class="text-sm text-blue-800">
                                Catatan: Pemesanan ini akan menunggu konfirmasi dari admin sebelum status pemesanan diubah menjadi "Confirmed".
                            </p>
                        </div>
                        
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                                Pesan Sekarang
                            </button>
                        </div>
                    </form>
                </div>
                
                <div>
                    <h2 class="text-xl font-medium text-gray-800 mb-4">Informasi Kamar</h2>
                    <div class="bg-white rounded-md shadow-sm p-4 border border-gray-200">
                        <h3 class="font-semibold text-lg mb-2">{{ $room->name }}</h3>
                        <p class="text-gray-600 mb-2">{{ Str::limit($room->description, 100) }}</p>
                        
                        <div class="border-t border-gray-200 pt-2 mt-2">
                            <div class="flex justify-between items-center">
                                <span class="font-medium text-gray-700">Harga per Malam:</span>
                                <span class="font-bold text-blue-600">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        <div class="mt-2">
                            <h4 class="font-medium text-gray-700">Fasilitas:</h4>
                            <p class="text-gray-600 mt-1">{{ $room->facilities }}</p>
                        </div>
                    </div>
                    
                    <div class="mt-4 text-sm text-gray-600">
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