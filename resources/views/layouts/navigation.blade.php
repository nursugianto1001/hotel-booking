@php
$dashboardRoute = Auth::user()->usertype == 'admin' ? route('admin.dashboard') : route('user.dashboard');
@endphp
<nav x-data="{ open: false }" class="bg-blue-800 border-b border-blue-700 shadow-lg">
    <div class="max-w-1xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex items-center">
                <a href="{{ $dashboardRoute }}" class="text-white text-xl font-bold">
                    HotelBooking
                </a>
                <div class="hidden space-x-8 sm:flex ml-10">
                    <x-nav-link :href="$dashboardRoute" :active="request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard')" class="text-white hover:text-gray-300">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @if (Auth::user()->usertype == 'admin')
                    <x-nav-link :href="route('admin.rooms.index')" :active="request()->routeIs('admin.rooms.index')" class="text-white hover:text-gray-300">
                        {{ __('Buat Kamar') }}
                    </x-nav-link>
                    <x-nav-link :href="route('admin.bookings.index')" :active="request()->routeIs('admin.bookings.index')" class="text-white hover:text-gray-300">
                        {{ __('Daftar Booking') }}
                    </x-nav-link>
        
                    @else
                    <x-nav-link :href="route('user.rooms.index')" :active="request()->routeIs('user.rooms.index')" class="text-white hover:text-gray-300">
                        {{ __('Cari Kamar') }}
                    </x-nav-link>
                    <x-nav-link :href="route('user.bookings.index')" :active="request()->routeIs('user.bookings.index')" class="text-white hover:text-gray-300">
                        {{ __('Daftar Booking') }}
                    </x-nav-link>
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-white text-sm font-medium hover:text-gray-300 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 w-4 h-4 text-white" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8l5 5 5-5" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="-mr-2 flex sm:hidden">
                <button @click="open = ! open" class="text-white hover:text-gray-300 focus:outline-none">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-blue-900">
        <div class="pt-2 pb-3 space-y-1 text-white">
            <x-responsive-nav-link :href="$dashboardRoute" :active="request()->routeIs('admin.dashboard') || request()->routeIs('user.dashboard')" class="block px-4 py-2">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-4 pb-1 border-t border-gray-700 text-white">
            <div class="px-4">
                <div class="font-medium text-base">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-4 py-2">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();" class="block px-4 py-2">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
