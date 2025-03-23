<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Detail Pemesanan</h1>
            <a href="{{ route('user.bookings.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                Kembali
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-gray-50 rounded-lg p-6 mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-xl font-medium text-gray-800 mb-4">Informasi Pemesanan</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="font-medium text-gray-700">ID Pemesanan:</span> 
                            <span>{{ $booking->id }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Status:</span> 
                            <span class="px-3 py-1 rounded-full text-white 
                                {{ $booking->status == 'pending' ? 'bg-yellow-500' : 
                                   ($booking->status == 'confirmed' ? 'bg-green-500' : 
                                   ($booking->status == 'rejected' ? 'bg-red-500' : 
                                   ($booking->status == 'completed' ? 'bg-gray-500' : ''))) }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Tanggal Pemesanan:</span> 
                            <span>{{ $booking->created_at->format('d M Y, H:i') }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Check-in:</span> 
                            <span>{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Check-out:</span> 
                            <span>{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Jumlah Tamu:</span> 
                            <span>{{ $booking->guests }} orang</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Durasi Menginap:</span> 
                            <span>{{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }} malam</span>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-xl font-medium text-gray-800 mb-4">Informasi Kamar</h2>
                    <div class="space-y-3">
                        <div>
                            <span class="font-medium text-gray-700">Nama Kamar:</span> 
                            <span>{{ $booking->room->name }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Harga per Malam:</span> 
                            <span>Rp {{ number_format($booking->room->price, 0, ',', '.') }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Total Harga:</span> 
                            <span class="text-lg font-bold text-blue-600">
                                Rp {{ number_format($booking->room->price * \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)), 0, ',', '.') }}
                            </span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Fasilitas:</span> 
                            <p class="mt-1">{{ $booking->room->facilities }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(in_array($booking->status, ['pending', 'confirmed']))
        <div class="flex justify-end">
            <form action="{{ route('user.bookings.cancel', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
                    Batalkan Pemesanan
                </button>
            </form>
        </div>
        @endif
    </div>
</x-app-layout>