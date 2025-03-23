<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserBookingController extends Controller
{
    /**
     * Display user's bookings
     */
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
                    ->with('room')
                    ->latest()
                    ->get();
                    
        return view('user.bookings.index', compact('bookings'));
    }
    
    /**
     * Show form to create a new booking
     */
    public function create(Room $room)
    {
        return view('user.bookings.create', compact('room'));
    }
    
    /**
     * Store a new booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
        ]);
        
        // Check if room is available
        $room = Room::findOrFail($request->room_id);
        if ($room->status !== 'available') {
            return redirect()->back()->with('error', 'Kamar tidak tersedia untuk saat ini.');
        }
        
        // Check for date conflicts with existing bookings
        $conflictingBookings = Booking::where('room_id', $request->room_id)
            ->where('status', '!=', 'rejected')
            ->where(function($query) use ($request) {
                $query->whereBetween('check_in', [$request->check_in, $request->check_out])
                    ->orWhereBetween('check_out', [$request->check_in, $request->check_out])
                    ->orWhere(function($q) use ($request) {
                        $q->where('check_in', '<=', $request->check_in)
                          ->where('check_out', '>=', $request->check_out);
                    });
            })
            ->exists();
            
        if ($conflictingBookings) {
            return redirect()->back()->with('error', 'Kamar sudah dipesan pada tanggal tersebut.');
        }
        
        // Create booking
        Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $request->room_id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guests' => $request->guests,
            'status' => 'pending'
        ]);
        
        return redirect()->route('user.bookings.index')->with('success', 'Pemesanan berhasil dibuat! Menunggu konfirmasi.');
    }
    
    /**
     * Show booking details
     */
    public function show(Booking $booking)
    {
        // Make sure user only sees their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        
        return view('user.bookings.show', compact('booking'));
    }
    
    /**
     * Cancel a booking
     */
    public function cancel(Booking $booking)
    {
        // Make sure user only cancels their own bookings
        if ($booking->user_id !== Auth::id()) {
            abort(403);
        }
        
        // Only pending or confirmed bookings can be canceled
        if (!in_array($booking->status, ['pending', 'confirmed'])) {
            return redirect()->back()->with('error', 'Pemesanan ini tidak dapat dibatalkan.');
        }
        
        $booking->update(['status' => 'rejected']);
        
        return redirect()->route('user.bookings.index')->with('success', 'Pemesanan berhasil dibatalkan.');
    }
}