<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class UserRoomController extends Controller
{
    /**
     * Display all available rooms with search functionality
     */
    public function index(Request $request)
    {
        $query = Room::where('status', 'available');
        
        // Filter berdasarkan pencarian nama
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%')
                  ->orWhere('facilities', 'like', '%' . $search . '%');
            });
        }
        
        // Filter berdasarkan rentang harga
        if ($request->has('min_price') && !empty($request->min_price)) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->has('max_price') && !empty($request->max_price)) {
            $query->where('price', '<=', $request->max_price);
        }
        
        $rooms = $query->get();
        
        return view('user.rooms.index', compact('rooms'));
    }
    
    /**
     * Display single room details
     */
    public function show(Room $room)
    {
        return view('user.rooms.show', compact('room'));
    }
}