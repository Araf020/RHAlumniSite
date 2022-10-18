<?php

namespace App\Http\Controllers;

use App\BulkMail;
use App\Mail\SendPendingMail;
use App\RegistrationForm;
use Carbon\Carbon;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function allPendingTrans()
    {
    	$datas = RegistrationForm::where('order_status','Failed')->where('created_at', '<',Carbon::parse('-2 hours'))->get();
        // $datas = RegistrationForm::where('order_status','Failed')->where('created_at', '<',Carbon::now()->subHour(1)->toDateTimeString())->get();
        return $datas;
    	foreach ($datas as $data) {
    		$this->clone($data);
    		$this->sendPendingMail($data);
    		$this->sendSms($data);
    	}

    	return $datas;
    }

    public function clone($data)
    {
    	$new_data = $data->attributesToArray();
        // remove name and price attributes
        DB::table('pending_entry')->insert($new_data);
    }


    public function sendPendingMail($data){
        Mail::to($data->email)->send(new SendPendingMail($data));
    }

    public function sendSms($data){

        $message  = $data->name.',since you have registerd more than 1 hour ago but not paid the money.';
        $message .= '%0aThat is why your data has been deleted from the database and now you can again register for the programe.';
        $message .= '%0aThank you. -SBHAA';


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

    public function getALlInfo()
    {
        // $data  = RegistrationForm::where('order_status','Processing')->orWhere('order_status','Complete')->pluck('email')->take(5);
        // return $data;
        // return $mail = BulkMail::where('status',0)->get();

        $data = 'dcasdasds
                asdasdasd
                asdasd
                asdasd';

        $newstring = preg_replace("/[\n\s]/","%0a",$data); 
        print $newstring; 


    }


}
