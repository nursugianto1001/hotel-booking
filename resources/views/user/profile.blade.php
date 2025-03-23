<x-app-layout>
    <div class="max-w-7xl mx-auto py-8 px-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Profil Saya</h1>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-gray-50 rounded-lg p-6">
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div class="mt-6 border-t border-gray-200 pt-6">
                    <div class="flex items-center">
                        <div class="text-gray-700">
                            <h3 class="text-lg font-medium">Informasi Tambahan</h3>
                            <p class="text-sm mt-1">Informasi ini ditampilkan dalam pemesanan Anda.</p>
                        </div>
                    </div>
                    
                    <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="created_at" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Registrasi</label>
                            <input type="text" id="created_at" value="{{ $user->created_at->format('d M Y, H:i') }}" 
                                class="w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" readonly>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 border-t border-gray-200 pt-6">
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700">
                            Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>