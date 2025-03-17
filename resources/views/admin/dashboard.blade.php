<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card: Total Kamar -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Total Kamar</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalRooms }}</p>
                    </div>
                    <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h11M9 21V3m0 18l-6-6m6 6l6-6"></path></svg>
                </div>

                <!-- Card: Total Pemesanan -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Total Pemesanan</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalBookings }}</p>
                    </div>
                    <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path></svg>
                </div>

                <!-- Card: Pemesanan Menunggu Konfirmasi -->
                <div class="bg-white shadow-md rounded-lg p-6 flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700">Menunggu Konfirmasi</h3>
                        <p class="text-3xl font-bold text-gray-900">{{ $pendingBookings }}</p>
                    </div>
                    <svg class="w-12 h-12 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m9 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>

            <!-- Tabel Pemesanan Terbaru -->
            <div class="bg-white shadow-md rounded-lg mt-6 p-6">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Pemesanan Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="w-full table-auto border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border border-gray-300 px-4 py-2">Nama</th>
                                <th class="border border-gray-300 px-4 py-2">Kamar</th>
                                <th class="border border-gray-300 px-4 py-2">Check-in</th>
                                <th class="border border-gray-300 px-4 py-2">Check-out</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latestBookings as $booking)
                                <tr class="text-center">
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
