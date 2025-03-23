<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    /**
     * Tampilkan daftar booking.
     */
    public function index()
    {
        $bookings = Booking::with(['user', 'room'])->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Ubah status booking (terima/tolak).
     */
    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|string|in:pending,confirmed,rejected,completed',
        ]);

        $booking->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status booking diperbarui!');
    }
}