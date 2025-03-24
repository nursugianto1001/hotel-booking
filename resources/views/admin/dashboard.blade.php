<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight flex items-center gap-2">
            {{ __('Dashboard Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card: Total Kamar -->
                <div class="bg-blue-50 shadow-lg rounded-xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-blue-800">Total Kamar</h3>
                        <p class="text-4xl font-bold text-blue-900">{{ $totalRooms }}</p>
                    </div>
                    <svg class="w-14 h-14 text-blue-600" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><path stroke-linecap="round" stroke-linejoin="round" d="M8 7a4 4 0 118 0"></path></svg>
                </div>

                <!-- Card: Total Pemesanan -->
                <div class="bg-green-50 shadow-lg rounded-xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-green-800">Total Pemesanan</h3>
                        <p class="text-4xl font-bold text-green-900">{{ $totalBookings }}</p>
                    </div>
                    <svg class="w-14 h-14 text-green-600" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m0 18l-6-6m6 6l6-6"></path></svg>
                </div>

                <!-- Card: Pemesanan Menunggu Konfirmasi -->
                <div class="bg-yellow-50 shadow-lg rounded-xl p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-yellow-800">Menunggu Konfirmasi</h3>
                        <p class="text-4xl font-bold text-yellow-900">{{ $pendingBookings }}</p>
                    </div>
                    <svg class="w-14 h-14 text-yellow-600" fill="none" stroke="currentColor" stroke-width="1" viewBox="0 0 25 25" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m9 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>

            <!-- Tabel Pemesanan Terbaru -->
            <div class="bg-white shadow-lg rounded-xl mt-6 p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4">Pemesanan Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-300">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-300 px-4 py-2">Nama</th>
                                <th class="border border-gray-300 px-4 py-2">Kamar</th>
                                <th class="border border-gray-300 px-4 py-2">Check-in</th>
                                <th class="border border-gray-300 px-4 py-2">Check-out</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestBookings as $booking)
                                <tr class="text-center bg-gray-50 hover:bg-gray-100 transition">
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->user->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->room->name }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->check_in }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $booking->check_out }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <span class="px-3 py-1 text-sm font-semibold rounded {{ $booking->status === 'pending' ? 'bg-yellow-500 text-white' : ($booking->status === 'approved' ? 'bg-green-500 text-white' : 'bg-red-500 text-white') }}">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
