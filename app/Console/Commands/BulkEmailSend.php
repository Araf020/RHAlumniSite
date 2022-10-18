<?php

namespace App\Console\Commands;

use App\BulkMail;
use App\Mail\BulkEmailSendToUser;
use App\RegistrationForm;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp;

class BulkEmailSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sbhaa:bulkmail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends BulkMail to all users';

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
        $text = BulkMail::where('status',0)->get();

        foreach ($text as $single_text) {
            $formatted_text = $this->getReplacedText($single_text->msg);

            $users = RegistrationForm::where('order_status','Processing')->orWhere('order_status','Complete')->get();

            foreach ($users as $data) {
                $this->sendSms($data,$formatted_text);
            }
            $single_text->update(['status'=>1]);
        }
    }


    public function sendConfirmationMail($data){
        Mail::to($data->to)
            ->bcc($this->allmail())
             ->send(new BulkEmailSendToUser($data));
    }

    public function allmail()
    {
       $data = RegistrationForm::where('order_status','Processing')->orWhere('order_status','Complete')->get();
        return $data;
    }


    public function sendSms($data,$text){

        $message  = $text;


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

    public function getReplacedText($text)
    {
        // return $text;
       // $new = preg_replace("/[\n]/","%0a",$text); 
       // $new = preg_replace("/%0a[\s]/","%0a",$new); 
       // return $new;

        $arr = explode("\n", $text);

        for ($i=0; $i <count($arr) ; $i++) { 
            $arr[$i] = trim($arr[$i]);
        }


        $new = implode("%0a", $arr);
        return $new;
    }
}
