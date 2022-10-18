<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendPendingMail;
use App\RegistrationForm;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp;

class DeletePendingTransaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sbhaa:deletependingtransaction';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes Pending Transaction of more than 6 hours.';

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
        $datas = RegistrationForm::where('order_status','Pending')->orWhere('order_status','Canceled')->where('created_at', '<',Carbon::parse('-2 hours'))->get();
        foreach ($datas as $data) {
            $this->clone($data);
            $this->sendPendingMail($data);
            $this->sendSms($data);
            $data->delete();
        }
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

        $message  = $data->name.', Registration Id: '.$data->order_id.' ,since you have registerd more than 1 hour ago but not paid the money.';
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
}
