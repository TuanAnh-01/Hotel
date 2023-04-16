<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public $Event;
    public function index() {
        $room = DB::table('booking')->orderBy('updated_at', 'desc')->where('status', '=', 'Active')->get()->take(4);
        $event = DB::table('event')->orderBy('updated_at', 'desc')->where('status', '=', 'Active')->get()->take(4);
        $banner = DB::table('banner')->orderBy('updated_at', 'desc')->where('status', '=', '1')->get()->take(1);
        $images = DB::table('banner')->orderBy('updated_at', 'desc')->where('status', '=', '0')->get();
        return view('dashboard')->with('event',$event)->with('room',$room)->with('banner',$banner)->with('images',$images);
    }
       

}
