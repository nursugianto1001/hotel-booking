<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display user dashboard with their bookings and recommended rooms
     */
    public function index()
    {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)
                    ->with('room')
                    ->latest()->get();
        $activeBookings = Booking::where('user_id', $user->id)
                            ->whereIn('status', ['confirmed', 'pending'])
                            ->count();
        
        // Add recommended rooms
        $recommendedRooms = Room::where('status', 'available')
                          ->take(3)
                          ->latest()
                          ->get();
                        
        return view('user.dashboard', compact('bookings', 'activeBookings', 'recommendedRooms'));
    }

    /**
     * Display user profile
     */
    public function profile()
    {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

}