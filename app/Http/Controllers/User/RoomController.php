<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Tampilkan daftar kamar untuk user dengan filter pencarian.
     */
    public function index(Request $request)
    {
        $query = Room::where('status', 'available');

        if ($request->has('type') && $request->type != '') {
            $query->where('type', $request->type);
        }

        if ($request->has('max_price') && $request->max_price != '') {
            $query->where('price', '<=', $request->max_price);
        }

        $rooms = $query->get();

        return view('user.rooms.index', compact('rooms'));
    }

    /**
     * Tampilkan detail kamar.
     */
    public function show(Room $room)
    {
        return view('user.rooms.show', compact('room'));
    }
}
