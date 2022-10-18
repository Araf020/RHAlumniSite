<?php

namespace App\Http\Controllers;

use App\BulkMail;
use App\RegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BulkMailController extends Controller
{
	public function view()
	{
		return view('user.bulkmail');
	}

    public function SendBulkEmail(Request $request)
    {
    	// return $request->all();
    	// $this->sendConfirmationMail($request);
        $bulkmail = new BulkMail;
        $bulkmail->to = $request->email;
        $bulkmail->msg = $request->msg;
        $bulkmail->status = 0;
        $bulkmail->save();

        return 'sent';
    }





}
