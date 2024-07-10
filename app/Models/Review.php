<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id', 'name', 'email', 'rating', 'review',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
