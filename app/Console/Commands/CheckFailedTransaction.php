<?php

namespace App\Console\Commands;

use App\Mail\SendPaymentConfirmationMail;
use App\RegistrationForm;
use GuzzleHttp;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class CheckFailedTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sbhaa:failedtransaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks failed transactions and sends confirmation message if true';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $failed_transactions =  RegistrationForm::where('order_status','Failed')->orWhere('order_status','Canceled')->get();

       foreach ($failed_transactions as $Single_failed_transaction) {
            $client = new GuzzleHttp\Client();
            $res = $client->get('https://securepay.sslcommerz.com/validator/api/merchantTransIDvalidationAPI.php?tran_id='.$Single_failed_transaction->order_id.'&store_id=sbhaabuetlive&store_passwd=5BFE81D9A12B517209&format=json');
            $response =  json_decode($res->getBody(), true);

            foreach ($response['element'] as $single_element) {
                // dd($single_element);
                if ($single_element['status'] == 'VALID' || $single_element['status'] == 'VALIDATED') {
                    $this->sendConfirmationMail($Single_failed_transaction);
                    // $this->sendSms($Single_failed_transaction);
                    RegistrationForm::where('order_id',$Single_failed_transaction->order_id)->update(['order_status'=>'Processing']);
                }
            }
       }
    }

    public function sendConfirmationMail($data){
        Mail::to($data->email)->send(new SendPaymentConfirmationMail($data));
    }

    public function sendSms($data){

        $message  = $data->name.', your SBHAA Program Registration has been completed';
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

}