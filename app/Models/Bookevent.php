<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookevent extends Model
{
    public $table = "bookevent";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'capacity',
        'Price',
        'start',
        'end',
        'paymentstatus', 
        'room_id'
    ];
}
