<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HistoryController extends Controller
{
    public function index() {
        $sessions = DB::table('sessions')->value('user_id');
        $user = DB::table('users')->find($sessions);
        $history = DB::table('book')->orderBy('id', 'desc')->where('email', '=', $user->email)->get();
        return view('history')->with('history',$history);
    }

    public function historyEvent() {
        $sessions = DB::table('sessions')->value('user_id');
        $user = DB::table('users')->find($sessions);
        $history = DB::table('bookevent')->orderBy('id', 'desc')->where('email', '=', $user->email)->get();
        return view('historyEvent')->with('history',$history);
    }
}
