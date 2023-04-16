<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public $table = "booking";
     protected $fillable = [
        'name',
        'images',
        'title',
        'Price',
        'capacity',
        'services',
        'content',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Book::class);
    }
}
