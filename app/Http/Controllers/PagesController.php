<?php

namespace App\Http\Controllers;

use App\Mail\sendContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class PagesController extends Controller
{
    public function home()
    {
    	return view('user.home');
    }
    public function register()
    {
        return view('user.register');
    }

    public function save(Request $request)
    {
    	return $request->all();
    }

    public function tnc()
    {
        return view('user.tnc');
    }
    public function ec()
    {
        return view('user.ec');
    }
    public function smail()
    {
        return view('user.smail');
    }
    public function sendmail()
    {
        print_r($_POST);
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $data  = array('name'=>$name,'email'=>$email,'subject'=>$subject,'message'=>$message);
        Mail::to($email)->send(new sendContactMail($data));
    }
    public function regconfirm()
    {
        return view('user.regconfirm');
    }

    public function contact(Request $request)
    {
       //return $request->all();
        // show the data
        // print the 
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        // print the data in server log
        // logger is a function that is used to print the data in server log




        Mail::to('rh.reunion2023@gmail.com')->send(new sendContactMail($data));

           if (Mail::failures()) {
            return 0;
        }
        return 1;



    }
}