<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'room_id', 'check_in', 'check_out', 'guests', 'status'
    ];

    /**
     * Relasi ke User (Satu pemesanan hanya milik satu user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Room (Satu pemesanan hanya untuk satu kamar)
     */
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
