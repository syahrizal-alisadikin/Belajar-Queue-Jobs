<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\sendingEmail;
use App\Jobs\SendingEmail;
use App\Jobs\SendingNotification;
class EmailController extends Controller
{
    function index()
    {
        return view('sendemail');
    }

    function send(Request $request)
    {
        $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'message' => $request->message,
            'phone'  => '6289649532860'
        ];
        $name = [
            'name' => $request->name,
            'message' => $request->message,
            'phone'  => '467474'
        ];
         $tes = [
            'name' => $request->name,
            'message' => $request->message,
            'phone'  => '0897979'
        ];
        dispatch(new SendingEmail($data,$name,$tes));

        //  Mail::to('alisadikinsyahrizal@gmail.com')->send(new sendingEmail());
        return back()->with('success', 'Thanks for contacting us!');
        //  Mail::send('email_template', array('emails' => $data), function ($pesan) use ($request) {
        //                         $pesan->to('alisadikinsyahrizal@gmail.com')->subject('Transaksi Membeli di PT Akadbaiq Indonesia');
        //                         $pesan->from(env('infoakadbaiq@gmail.com', 'infoakadbaiq@gmail.com'), 'PT Akadbaiq Indonesia');
        //                     });
        return back()->with('success', 'Thanks for contacting us!');
    }
}
