<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $room = DB::table('booking')->orderBy('updated_at', 'desc')->paginate(4);
        $banner = DB::table('banner')->orderBy('updated_at', 'desc')->where('status', '=', '1')->get()->take(1);
        return view('Room')->with('room',$room)->with('banner',$banner);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function keySession(Request $request)
    {
        //
        session()->put('arrival', Carbon::parse($request->arrival));
        session()->put('departure', Carbon::parse($request->departure));
        
        session()->put('room_id', $request->room_id);
        session()->put('name', $request->name);
        session()->put('email', $request->email);
        session()->put('phone', $request->phone);
        session()->put('capacity', $request->capacity);
        session()->put('Price', $request->Price);
        $date = session('arrival')->diffInDays(session('departure'));
        $total = $date * $request->Price;
        session()->put('date', $date);
        session()->put('total', $total);
        return view('payment')->with('date',$date)->with('total',$total);

        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $room = Booking::findOrFail(session('room_id'));
        $room->status = 'Inactive';
        $room->save();

        DB::table('book')->insert([
            'name' => session('name'),
            'email' => session('email'),
            'phone' => session('phone'),
            'capacity' => session('capacity'),
            'Price' => session('total'),
            'arrival' => session('arrival'),
            'departure' => session('departure'),
            'room_id'=> session('room_id'),
            'paymentstatus' => 'Wait for confirmation',
            'status' => 'Inactive'
        ]);

        return redirect()
            ->route('history')
            ->with('success','Country creared');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $showroom = DB::table('booking')->find($id);
        return view('showroom')->with('showroom',$showroom);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
