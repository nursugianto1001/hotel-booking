<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-gray-100 shadow-lg rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-gray-800">Detail Pemesanan</h1>
            <a href="{{ route('user.bookings.index') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Kembali</a>
        </div>

        @if(session('success'))
            <div class="bg-green-500 text-white px-4 py-3 rounded mb-4 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-500 text-white px-4 py-3 rounded mb-4 shadow-md">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-white p-6 rounded-lg shadow-md">
            <div>
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informasi Pemesanan</h2>
                <div class="space-y-4">
                    <p><strong class="text-gray-600">ID Pemesanan:</strong> {{ $booking->id }}</p>
                    <p><strong class="text-gray-600">Status:</strong>
                        <span class="px-3 py-1 rounded-full text-white text-sm {{ $booking->status == 'pending' ? 'bg-yellow-500' : ($booking->status == 'confirmed' ? 'bg-green-500' : ($booking->status == 'rejected' ? 'bg-red-500' : 'bg-gray-500')) }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </p>
                    <p><strong class="text-gray-600">Tanggal Pemesanan:</strong> {{ $booking->created_at->format('d M Y, H:i') }}</p>
                    <p><strong class="text-gray-600">Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</p>
                    <p><strong class="text-gray-600">Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</p>
                    <p><strong class="text-gray-600">Jumlah Tamu:</strong> {{ $booking->guests }} orang</p>
                    <p><strong class="text-gray-600">Durasi Menginap:</strong> {{ \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)) }} malam</p>
                </div>
            </div>
            <div>
                <h2 class="text-2xl font-semibold text-gray-700 mb-4">Informasi Kamar</h2>
                <div class="space-y-4">
                    <p><strong class="text-gray-600">Nama Kamar:</strong> {{ $booking->room->name }}</p>
                    <p><strong class="text-gray-600">Harga per Malam:</strong> Rp {{ number_format($booking->room->price, 0, ',', '.') }}</p>
                    <p><strong class="text-gray-600">Total Harga:</strong> 
                        <span class="text-lg font-bold text-blue-600">Rp {{ number_format($booking->room->price * \Carbon\Carbon::parse($booking->check_in)->diffInDays(\Carbon\Carbon::parse($booking->check_out)), 0, ',', '.') }}</span>
                    </p>
                    <p><strong class="text-gray-600">Fasilitas:</strong> {{ $booking->room->facilities }}</p>
                </div>
            </div>
        </div>

        @if(in_array($booking->status, ['pending', 'confirmed']))
        <div class="flex justify-end mt-6">
            <form action="{{ route('user.bookings.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700 transition">Batalkan Pemesanan</button>
            </form>
        </div>
        @endif
    </div>
</x-app-layout>
