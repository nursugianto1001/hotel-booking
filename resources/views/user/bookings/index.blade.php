<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-800">Daftar Pemesanan</h1>
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

        <div class="bg-gray-50 rounded-lg p-6">
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2">ID</th>
                        <th class="border border-gray-300 px-4 py-2">Nama Kamar</th>
                        <th class="border border-gray-300 px-4 py-2">Check-in</th>
                        <th class="border border-gray-300 px-4 py-2">Check-out</th>
                        <th class="border border-gray-300 px-4 py-2">Jumlah Tamu</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        <tr class="border border-gray-200">
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $booking->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $booking->room->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $booking->guests }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <span class="px-3 py-1 rounded-full text-white 
                                    {{ $booking->status == 'pending' ? 'bg-yellow-500' : 
                                       ($booking->status == 'confirmed' ? 'bg-green-500' : 
                                       ($booking->status == 'rejected' ? 'bg-red-500' : 
                                       ($booking->status == 'completed' ? 'bg-gray-500' : ''))) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <a href="{{ route('user.bookings.show', $booking->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700">Detail</a>
                                @if(in_array($booking->status, ['pending', 'confirmed']))
                                    <form action="{{ route('user.bookings.cancel', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700">Batal</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
