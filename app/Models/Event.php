<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Event extends Model
{
    use HasFactory;
    public $table = "event";
     protected $fillable = [
        'name',
        'images',
        'title',
        'venue',
        'Capacity',
        'services',
        'organization',
        'Price',
        'content',
        'views_count',
        'Status'
    ];

    public function getEvent() {
        DB::table('event')->get();
    }
}
