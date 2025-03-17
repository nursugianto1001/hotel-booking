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
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'status' => 'required|string|in:available,booked',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Proses upload gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Room::create($data);
        return redirect()->back()->with('success', 'Kamar berhasil ditambahkan!');
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'facilities' => 'nullable|string',
            'status' => 'required|in:available,booked',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Cek apakah ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $room->update($data);
        return redirect()->route('admin.rooms.index')->with('success', 'Kamar berhasil diperbarui!');
    }

    public function edit(Room $room)
    {
        return view('admin.rooms.edit', compact('room'));
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
