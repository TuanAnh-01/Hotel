<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Mail\SendEmail;
use Illuminate\Mail\Message;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     
     */
    public function index(Request $request)
    {
        $mailData = [
            'title' => 'Ý kiến khách hàng',
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,

        ];

        try {
            Mail::to('tuantlg63@gmail.com')->send(new ContactMail($mailData));
            try{
                Mail::to($request->email)->send(new SendEmail($mailData));
            }
            catch(\Exception $e) {

            }
            session()->flash('success', 'Thông báo không thành công!');
        }
        catch(\Exception $e) {
            session()->flash('error', 'Thông báo không thành công!');
        }
       
        
        return redirect()
            ->route('Contact');
    }

    
}