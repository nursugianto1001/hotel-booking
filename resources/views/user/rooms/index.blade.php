<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Daftar Kamar Tersedia</h1>

        <div class="bg-gray-50 p-6 rounded-lg mb-6">
            <form action="{{ route('user.rooms.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Kamar</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Nama kamar atau fasilitas" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                
                <div>
                    <label for="min_price" class="block text-sm font-medium text-gray-700 mb-1">Harga Minimal</label>
                    <input type="number" name="min_price" id="min_price" value="{{ request('min_price') }}" placeholder="Rp" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                
                <div>
                    <label for="max_price" class="block text-sm font-medium text-gray-700 mb-1">Harga Maksimal</label>
                    <input type="number" name="max_price" id="max_price" value="{{ request('max_price') }}" placeholder="Rp" 
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                
                <div class="md:col-span-3 flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Filter
                    </button>
                    
                    @if(request('search') || request('min_price') || request('max_price'))
                        <a href="{{ route('user.rooms.index') }}" class="ml-2 bg-gray-600 text-white px-4 py-2 rounded-md hover:bg-gray-700">
                            Reset
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($rooms as $room)
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                <div class="h-48 bg-gray-300 flex items-center justify-center">
                    @if($room->image)
                        <img src="{{ asset('storage/' . $room->image) }}" alt="{{ $room->name }}" class="object-cover w-full h-full">
                    @else
                        <span class="text-gray-400">No Image</span>
                    @endif
                </div>
                
                <div class="p-4">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">{{ $room->name }}</h2>
                    <p class="text-gray-600 mb-4 h-12 overflow-hidden">{{ Str::limit($room->description, 100) }}</p>
                    
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-lg font-bold text-blue-600">Rp {{ number_format($room->price, 0, ',', '.') }}</span>
                        <span class="bg-green-100 text-green-800 text-sm px-2 py-1 rounded">Available</span>
                    </div>
                    
                    <div class="flex justify-end">
                        <a href="{{ route('user.rooms.show', $room->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if(count($rooms) == 0)
            <div class="md:col-span-3 py-8 text-center text-gray-500">
                <p class="text-lg">Tidak ada kamar yang sesuai dengan filter yang dipilih.</p>
                <a href="{{ route('user.rooms.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">Reset Filter</a>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>