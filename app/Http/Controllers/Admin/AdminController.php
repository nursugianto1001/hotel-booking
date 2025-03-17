<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $totalRooms = Room::count();
        $totalBookings = Booking::count();
        $pendingBookings = Booking::where('status', 'pending')->count();
        $latestBookings = Booking::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalRooms', 'totalBookings', 'pendingBookings', 'latestBookings'));
    }
}
