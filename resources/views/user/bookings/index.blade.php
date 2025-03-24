<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-lg rounded-lg">
        <div class="flex justify-between items-center mb-6 border-b pb-4">
            <h1 class="text-1xl font-semibold text-gray-800">Kamar Yang Sudah di Booking!</h1>
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

        <div class="bg-gray-50 rounded-lg p-6 shadow-md">
            <table class="w-full border-collapse overflow-hidden rounded-lg">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-500 to-blue-700 text-white">
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Nama Kamar</th>
                        <th class="px-4 py-3 text-left">Check-in</th>
                        <th class="px-4 py-3 text-left">Check-out</th>
                        <th class="px-4 py-3 text-center">Jumlah Tamu</th>
                        <th class="px-4 py-3 text-center">Status</th>
                        <th class="px-4 py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-3">{{ $booking->id }}</td>
                            <td class="px-4 py-3">{{ $booking->room->name }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($booking->check_in)->format('d M Y') }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($booking->check_out)->format('d M Y') }}</td>
                            <td class="px-4 py-3 text-center">{{ $booking->guests }}</td>
                            <td class="px-4 py-3 text-center">
                                <span class="px-3 py-1 rounded-full text-white 
                                    {{ $booking->status == 'pending' ? 'bg-yellow-500' : 
                                       ($booking->status == 'confirmed' ? 'bg-green-500' : 
                                       ($booking->status == 'rejected' ? 'bg-red-500' : 
                                       ($booking->status == 'completed' ? 'bg-gray-500' : ''))) }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-center space-x-2">
                                <a href="{{ route('user.bookings.show', $booking->id) }}" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700 shadow">Detail</a>
                                @if(in_array($booking->status, ['pending', 'confirmed']))
                                    <form action="{{ route('user.bookings.cancel', $booking->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin membatalkan pemesanan ini?')">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 shadow">Batal</button>
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
