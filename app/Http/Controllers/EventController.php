<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $event = DB::table('event')
                                    ->orderBy('id', 'desc')                     
                                    ->where('name', 'like', '%'.$request->keyword.'%')
                                    ->orWhere('title', 'like', '%'.$request->keyword.'%')
                                    ->orWhere('venue', 'like', '%'.$request->keyword.'%')                     
                                    ->paginate(4);
        $eventbaner = DB::table('event')->orderBy('views_count', 'desc')->where('Status', '=', 'Active')->take(1)->get();
        $eventnew = DB::table('event')->orderBy('views_count', 'desc')->where('Status', '=', 'Active')->skip(1)->take(4)->get();
        $banner = DB::table('banner')->orderBy('updated_at', 'desc')->where('status', '=', '1')->get()->take(1);
        return view('Event')->with('event',$event)->with('eventbaner',$eventbaner)->with('eventnew',$eventnew)->with('banner',$banner);
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
        session()->put('Capacity', $request->Capacity);
        session()->put('Price', $request->Price);
        $date = session('arrival')->diffInDays(session('departure'));
        $total = $date * $request->Price;
        session()->put('date', $date);
        session()->put('total', $total);
        return view('paymentEvent')->with('date',$date)->with('total',$total);

        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        //
        $event = Event::findOrFail(session('room_id'));
        $event->Status = 'Inactive';
        $event->save();

        DB::table('bookevent')->insert([
            'name' => session('name'),
            'email' => session('email'),
            'phone' => session('phone'),
            'Capacity' => session('Capacity'),
            'Price' => session('total'),
            'start' => session('arrival'),
            'end' => session('departure'),
            'room_id'=> session('room_id'),
            'paymentstatus' => 'Wait for confirmation'
            
        ]);

        return redirect()
            ->route('historyEvent');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $post = Event::find($id); 
        $post->increment('views_count');
        $post->save();
        session()->put('id', $id);
        $showevent = DB::table('event')->find($id);
        $comment = DB::table('comment')->where('id_comment', '=', session('id'))->orderBy('id', 'desc')->paginate(4);
        $count = DB::table('comment')->where('id_comment', '=', session('id'))->count();
        return view('Showevent')->with('showevent',$showevent)->with('comment',$comment)->with('count',$count);
    }

    public function createComment(Request $request) {
        $update = Carbon::now();
        if(isset(Auth::user()->profile_photo_path)){
            DB::table('comment')->insert([
                'name' => $request->name_comment,
                'content' => $request->comment,
                'images' => Auth::user()->profile_photo_path ,
                'updated_at' => $update,
                'id_comment' => session('id')
                
            ]);
           return redirect()->back();
        }

        DB::table('comment')->insert([
            'name' => $request->name_comment,
            'content' => $request->comment,
            'updated_at' => $update,
            'id_comment' => session('id')
            
        ]);
       return redirect()->back();
        
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
