<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\RegistrationForm;
use App\TempRegForm;
use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['session','sms']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function session()
    {
        //Session::forget('payment_values');
        //Session::put('payment_values.tran_id', '1404143');
        //$_SESSION['aaa']['tran_id']='123456';
        // //Session::push('foo.bar','value');
       // return Redirect(Route('pay'));
       return Session::all();

        // $data = DB::table('registration_forms')
        //                             ->where('order_id', 1404143)
        //                             ->select('order_id', 'order_status','currency','total_amount')->get()->first();
        // dd($data->order_status);
    }


    public function mail()
    {
        Mail::to('xatta.trone@gmail.com')->send(new TestMail());
    }

    public function qr()
    {
        //return '<img src="data:image/png;base64, base64_encode('.QrCode::format('png')->size(100)->generate('Make me into an QrCode!').') ">';
        $data = QrCode::size(500)->format('png')->encoding('UTF-8')->generate('Make me a QrCode with special symbols ♠♥!!');

        //$file_name = Storage::put('avatars/1', $fileContents);
        //return 'ok';

        //QrCode::size(500)->format('svg')->generate('SBHFD0DDEE8',url('/').'/public/storage/qrcodes/qrcode.svg');
        return view('user.qr')->with('data',$data);
        //return  QRCode::text('Laravel QR Code Generator!')->png();   
    }
    public function sms()
    {
        $client = new GuzzleHttp\Client();
        $res = $client->get('http://166.62.16.132/A_SMS/smssend.php?phone=01521112102&text=This is a test message&user=sbhaa&password=sbhsms2019');
        return $res->getStatusCode(); 
        
    }

    public function unique_order_id(){
        $prefix = 'SBH';
        $rand = strtoupper(substr(uniqid(sha1(time())),0,8));
        //return $temp = $prefix.$rand;
        //generates the order id
        $tr_code = $prefix.$rand;
        //$tr_code = 'SBH9BCE6C48';
        //check the order id with existing order ids
        $registration_form = RegistrationForm::where('order_id',$tr_code);
        $temp_form         = TempRegForm::where('order_id',$tr_code);
        $results           = $registration_form->union($temp_form)
                                                ->orderBy('created_at','desc');;
        $results           = $results->get()->count();
        //return $tr_code.' '.$results;
        // run the loop again if the order id matches with database otherwise just return the order id just created
        // $results > 0 ? 'Found' : 'Not found'
        if($results > 0){
            $this->unique_order_id();
        }
        return $tr_code;
    }


    public function mobile($mobile)
    {
        //return $mobile;

        return $mobile = $this->getDigitedNumber($mobile);
        $registration_form = RegistrationForm::where('mobile_1','like','%'.$mobile.'%');
        $temp_form         = TempRegForm::where('mobile_1','like','%'.$mobile.'%');
        $results           = $registration_form->union($temp_form)
                                                ->orderBy('created_at','desc');;
        $results           = $results->get()->count();
        return ($results > 0) ? 'Exists' : 'Not exist' ;


    }

    public function getDigitedNumber($mobile)
    {
      return $mobile;
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

    public function smstest(){
        $data = RegistrationForm::find(3)->get()->first();

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
        return $res->getStatusCode(); 
    }

    public function excell()
    {
       

        function excel()
           {
            $customer_data = DB::table('registration_forms')->get()->toArray();
            $customer_array[] = array('Id', 'Name', 'Nickname', 'Order id', 'Order Status','Department','Exam Session','Graduation Year','Attachment','Room No','Hall Duration','Birth date','gender','Present Address','Hobby','PostCode','Mobile 1','Mobile 2','Email','Occupation','Position','Organization','Spouse Name','Spouse Profession','14th Feb lunch','14th Feb Dinner','15th Feb Lunch','15th Feb Dinner','Drivers Dinner','Total amount','Payment Method','added_by','Created At');
            foreach($customer_data as $customer)
            {
             $customer_array[] = array(
              'Id'  => $customer->id,
              'Name'   => $customer->name,
              'Nickname'    => $customer->nick_name,
              'Order id'  => $customer->order_id,
              'Order Status'   => $customer->order_status,
              'Department'   => $customer->department,
              'Exam Session'   => $customer->exam_session,
              'Graduation Year'   => $customer->graduation_year,
              'Attachment'   => $customer->attachment,
              'Room No'   => $customer->room_no,
              'Hall Duration'   => $customer->hall_duration,
              'Birth date'   => $customer->birthdate,
              'gender'   => $customer->gender,
              'Present Address'   => $customer->present_address,
              'Hobby'   => $customer->hobby,
              'PostCode'   => $customer->postcode,
              'Mobile 1'   => $customer->mobile_1,
              'Mobile 2'   => $customer->mobile_2,
              'Email'   => $customer->email,
              'Occupation'   => $customer->occupation,
              'Position'   => $customer->position,
              'Organization'   => $customer->organization,
              'Spouse Name'   => $customer->spouse_name,
              'Spouse Profession'   => $customer->spouse_profession,
              '14th Feb lunch'   => $customer->d1la,
              '14th Feb Dinner'   => $customer->d1da,
              '15th Feb Lunch'   => $customer->d2la,
              '15th Feb Dinner'   => $customer->d2da,
              'Drivers Dinner'   => $customer->driver,
              'Total amount'   => $customer->total_amount,
              'Payment Method'   => $customer->payment_method,
              'added_by'   => $customer->added_by,
              'Created At'   => $customer->created_at
             );
            }


            Excel::create('Customer Data', function($excel) use ($customer_array){
             $excel->setTitle('Customer Data');
             $excel->sheet('Customer Data', function($sheet) use ($customer_array){
              $sheet->fromArray($customer_array, null, 'A1', false, false);
             });
            })->download('xlsx');


           }


             
    }
    public function exportFile(){

        $products = RegistrationForm::where('order_status','<>','Failed')->get()->toArray();


        return Excel::create('hdtuto_demo', function($excel) use ($products) {
            $excel->setTitle('Customer Data');
            $excel->sheet('sheet name', function($sheet) use ($products)

            {

                $sheet->fromArray($products);

            });

        })->download('xlsx');

    } 

    public function tshirt()
    {
      $pieUserDatas = DB::table('registration_forms')
                             ->selectRaw('`t_shirt` as tshirt, count(`id`) as number')
                             ->where('order_status','<>','Failed')
                             ->where('order_status','<>','Pending')
                             ->groupBy('t_shirt')
                             ->orderBy('t_shirt','asc')
                             ->get();
    return $pieUserDatas;
    }



}
