<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $table = "book";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'Price',
        'arrival',
        'departure',
        'paymentstatus', 
        'room_id',
        'status'
    ];

    


    // public static function boot()
    // {
    //     parent::boot();

    //     static::created(function($booking) {
    //         $room = Room::findOrFail($roomId);
    //         $room->is_available = false;
    //         $room->save();
    //     });
    // }

    // public function room()
    // {
    //     return $this->belongsTo(Booking::class);
    // }
}
