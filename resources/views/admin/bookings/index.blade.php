<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Booking</h1>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-100">
                    <tr class="text-left text-gray-700">
                        <th class="border border-gray-300 px-4 py-2">Nama User</th>
                        <th class="border border-gray-300 px-4 py-2">Kamar</th>
                        <th class="border border-gray-300 px-4 py-2">Status</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $booking->room->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <span class="px-3 py-1 rounded-full text-white 
                                {{ $booking->status == 'pending' ? 'bg-yellow-500' : 
                                   ($booking->status == 'confirmed' ? 'bg-green-500' : 'bg-red-500') }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td class="border border-gray-300 px-4 py-2 text-center">
                            <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <div class="flex items-center gap-2">
                                    <select name="status" class="border-gray-300 rounded-md px-2 py-1">
                                        <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Diterima</option>
                                        <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                    </select>
                                    <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded-md hover:bg-blue-700">
                                        Update
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
