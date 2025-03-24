<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-gray-100 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Cari Kamar Seperti Apa Hari Ini?</h1>

        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('user.rooms.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                <div>
                    <label for="search" class="block text-sm font-semibold text-gray-700 mb-1">Cari Kamar</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nama kamar atau fasilitas" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300">
                </div>
                
                <div>
                    <label for="min_price" class="block text-sm font-semibold text-gray-700 mb-1">Harga Minimal</label>
                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="Rp" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300">
                </div>
                
                <div>
                    <label for="max_price" class="block text-sm font-semibold text-gray-700 mb-1">Harga Maksimal</label>
                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Rp" 
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-300">
                </div>
                
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow">Filter</button>
                    
                    @if(request('search') || request('min_price') || request('max_price'))
                        <a href="{{ route('user.rooms.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 shadow">Reset</a>
                    @endif
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach($rooms as $room)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-300 hover:shadow-xl transition-shadow duration-300">
                <div class="h-56 bg-gray-300 flex items-center justify-center">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="object-cover w-full h-full">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </div>
                
                <div class="p-5">
                    <h2 class="text-xl font-bold text-gray-800 mb-2">{{ $room->name }}</h2>
                    <p class="text-gray-600 mb-4 h-14 overflow-hidden">{{ Str::limit($room->description, 120) }}</p>
                    
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-bold text-blue-700">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                        <span class="bg-green-100 text-green-800 text-sm px-3 py-1 rounded-full">Tersedia</span>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="{{ route('user.rooms.show', $room->id) }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 shadow">Lihat Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if(count($rooms) == 0)
            <div class="md:col-span-3 py-12 text-center text-gray-500">
                <p class="text-lg">Tidak ada kamar yang sesuai dengan filter yang dipilih.</p>
                <a href="{{ route('user.rooms.index') }}" class="text-blue-600 hover:underline mt-4 inline-block">Reset Filter</a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
