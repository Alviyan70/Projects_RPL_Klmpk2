<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';

    protected $fillable = [
        'room_type', 'room_number', 'size', 'bed', 'description', 'price', 'capacity', 'status'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
 