<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HistoryController extends Controller
{
    public function index() {
        $email =  Auth::user()->email;
        $history = DB::table('book')->orderBy('id', 'desc')->where('email', '=', $email)->get();
        return view('history')->with('history',$history);
    }

    public function historyEvent() {
        $email =  Auth::user()->email;
        $history = DB::table('bookevent')->orderBy('id', 'desc')->where('email', '=', $email)->get();
        return view('historyEvent')->with('history',$history);
    }
}
