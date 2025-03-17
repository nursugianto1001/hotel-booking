<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'description', 'facilities', 'status', 'image'
    ];

    /**
     * Relasi ke Booking (Satu kamar bisa memiliki banyak pemesanan)
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
