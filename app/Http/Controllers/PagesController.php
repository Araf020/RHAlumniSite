<?php

namespace App\Http\Controllers;

use App\Mail\sendContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function home()
    {
    	return view('user.home');
    }
    public function register()
    {
        return view('user.register_backup');
    }

    public function save(Request $request)
    {
    	return $request->all();
    }

    public function tnc()
    {
        return view('user.tnc');
    }

    public function contact(Request $request)
    {
       //return $request->all();

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;




        Mail::to('sbhaa.buet@gmail.com')->send(new sendContactMail($data));

           if (Mail::failures()) {
            return 0;
        }
        return 1;



    }
}