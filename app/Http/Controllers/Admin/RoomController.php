<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Tampilkan daftar kamar.
     */
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms.index', compact('rooms'));
    }

    /**
     * Simpan kamar baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'type' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'status' => 'required|string|in:available,booked',
        ]);

        Room::create($request->all());
        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'status' => 'required|in:available,booked',
        ]);

        $room->update($request->all());

        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui!');
    }

    /**
     * Hapus kamar.
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->back()->with('success', 'Kamar berhasil dihapus!');
    }
}
