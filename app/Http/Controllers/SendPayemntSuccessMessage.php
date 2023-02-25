<?php

namespace App\Http\Controllers;

use App\Mail\BankPaymentInfo;
use App\Mail\SendPaymentConfirmationMail;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendPayemntSuccessMessage extends Controller
{

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function send($order_id){
        $data = DB::table('registration_forms')->where('order_id',$order_id)->first();
        //dd($data);
        $this->sendConfirmationMail($data);
        $this->sendSms($data);

        return 'Sent';
    }

    public function sendEmail($order_id){
        $data = DB::table('registration_forms')->where('order_id',$order_id)->first();
        //dd($data);
        $this->sendConfirmationMail($data);
        return 'email sent';
        
        
    }

	public function sendSmstouser($order_id){
		$data = DB::table('registration_forms')->where('order_id',$order_id)->first();
		//dd($data);
		$this->sendSms($data);
        return 'sms sent';
		
	}
    

    public function sendConfirmationMail($data){
        Mail::to($data->email)->send(new SendPaymentConfirmationMail($data));
    }

    public function sendSms($data){

        $message  = $data->name.', your RH Program Registration has been completed';
        $message .= '.%0aYour Application ID is: '.$data->order_id;
        $message .= '.%0aAmount received: '.$data->total_amount;
        $message .= '.%0aPayment method: '.$data->payment_method;
        $message .= '.%0aT-shirt Size: '.$data->t_shirt;
        $message .= '%0a%0a14th February %0aLunch: '.$data->d1la;
        $message .= '%0aDinner: '.$data->d1da;
        $message .= '%0a%0a15th February%0aLunch: '.$data->d2la;
        $message .= '%0aGrand Dinner: '.$data->d2da;
        $message .= '%0aDrivers Dinner: '.$data->driver;


        $client = new GuzzleHttp\Client();
        $res = $client->get('http://166.62.16.132/A_SMS/smssend.php?phone='.$this->getDigitedNumber($data->mobile_1).'&text='.$message.'&user=sbhaa&password=sbhsms2019');
        //return $res->getStatusCode(); 
    }

    public function getDigitedNumber($mobile)
    {
        if (strlen($mobile) > 11) {
            if (substr($mobile,0,3) == '+88') 
            {
                return substr($mobile,-11);
            }
            elseif (substr($mobile,0,4) == '0088') {
               return substr($mobile,-11);
            }else{
                return $mobile;
            }
        }
        return $mobile;
        
    }

    public function sendBankInfo($data){
        Mail::to($data->email)->send(new BankPaymentInfo($data));
    }

    public function sendBankSms($data){

        $message  = $data->name.', Please pay ';
        $message .= $data->total_amount;
        $message .= ' taka to Sonali Bank BUET Branch ';
        $message .= '.%0aAccount No: 4404034068519';
        $message .= '.%0aAfter Paying please visit the website and fill the Bank Payment Verify option.';


        $client = new GuzzleHttp\Client();
        $res = $client->get('http://166.62.16.132/A_SMS/smssend.php?phone='.$this->getDigitedNumber($data->mobile_1).'&text='.$message.'&user=sbhaa&password=sbhsms2019');
        //return $res->getStatusCode(); 
    }

    public function sendBank($order_id)
    {
        $data = DB::table('temp_reg_forms')->where('order_id',$order_id)->first();
        $this->sendBankSms($data);
        $this->sendBankInfo($data);
        return 'Bank sms and mail sent';
    }

    public function sendBankInfoSms($order_id)
    {
        $data = DB::table('temp_reg_forms')->where('order_id',$order_id)->first();
        $this->sendBankSms($data);
        return 'Bank sms sent';
    }

    public function sendBankInfoEmail($order_id)
    {
        $data = DB::table('temp_reg_forms')->where('order_id',$order_id)->first();
        $this->sendBankInfo($data);
        return 'Bank email sent';
    }
}
