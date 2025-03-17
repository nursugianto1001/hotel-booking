<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Tampilkan daftar kamar untuk user.
     */
    public function index()
    {
        $rooms = Room::where('status', 'available')->get();
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