<?php

namespace App\Http\Controllers;

use App\Mail\SendPaymentConfirmationMail;
use App\RegistrationForm;
use App\SaveChangesByAdmin;
use App\TempRegForm;
use GuzzleHttp;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
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
    
    
    public function adminhome()
    {
        $_14_lun = DB::table('registration_forms')->where('order_status','<>','Failed')->where('order_status','<>','Pending')
                                                    ->where('order_status','<>','Canceled')->sum('d1la');
        $_14_din = DB::table('registration_forms')->where('order_status','<>','Failed')->where('order_status','<>','Pending')
                                                    ->where('order_status','<>','Canceled')->sum('d1da');
        $_15_lun = DB::table('registration_forms')->where('order_status','<>','Failed')->where('order_status','<>','Pending')
                                                    ->where('order_status','<>','Canceled')->sum('d2la');
        $_15_din = DB::table('registration_forms')->where('order_status','<>','Failed')->where('order_status','<>','Pending')
                                                    ->where('order_status','<>','Canceled')->sum('d2da');
        $_15_dri = DB::table('registration_forms')->where('order_status','<>','Failed')->where('order_status','<>','Pending')
                                                    ->where('order_status','<>','Canceled')->sum('driver');
        $failed = DB::table('registration_forms')->where('order_status','Failed')->count();
        $pending = DB::table('registration_forms')->where('order_status','Pending')->count();
        $approval = DB::table('temp_reg_forms')->count();
        $total_online = DB::table('registration_forms')->where('payment_method','online')->where('order_status','<>','Failed')
                                    ->where('order_status','<>','Canceled')->where('order_status','<>','Pending')->sum('total_amount');
        //return $total_online;
        $total_bank = DB::table('registration_forms')->where('payment_method','bank')->where('order_status','<>','Failed')
                                    ->where('order_status','<>','Canceled')->where('order_status','<>','Pending')->sum('total_amount');
        $total_cash = DB::table('registration_forms')->where('payment_method','cash')->where('order_status','<>','Failed')
                                    ->where('order_status','<>','Canceled')->where('order_status','<>','Pending')->sum('total_amount');
        $total = DB::table('registration_forms')->where('order_status','Processing')->orWhere('order_status','Complete')->sum('total_amount');
        $total_reg = DB::table('registration_forms')->where('order_status','Processing')->orWhere('order_status','Complete')->count();
        $t_shirt = DB::table('registration_forms')
                           ->selectRaw('`t_shirt` as tshirt, count(`id`) as number')
                           ->where('order_status','<>','Failed')
                           ->where('order_status','<>','Pending')
                           ->where('order_status','<>','Canceled')
                           ->groupBy('t_shirt')
                           ->orderBy('t_shirt','asc')
                           ->get();
   $moved_data = DB::table('pending_entry')->count();

                           

       return view('admin.home')
                ->with('_14_lun',$_14_lun)
                ->with('_14_din',$_14_din)
                ->with('_15_lun',$_15_lun)
                ->with('_15_din',$_15_din)
                ->with('_15_dri',$_15_dri)
                ->with('total',$total)
                ->with('t_shirt',$t_shirt)
                ->with('total_reg',$total_reg)
                ->with('total_online',$total_online)
                ->with('total_bank',$total_bank)
                ->with('failed',$failed)
                ->with('pending',$pending)
                ->with('approval',$approval)
                ->with('moved_data',$moved_data)
                ->with('total_cash',$total_cash);
        //return view('admin.home');
    }

    public function alldata()
    {
        $allData = RegistrationForm::where('order_status','<>','Failed')->where('order_status','<>','Canceled')->where('order_status','<>','Pending')->orderBy('id','DESC')->get();
        //dd($allData);
        return view('admin.all')->with('alldata',$allData);
    }

    public function pending()
    {
        $allData = TempRegForm::orderBy('id','desc')->get();
        //dd($allData);
        return view('admin.pending')->with('alldata',$allData);
    }

    public function onlinePending()
    {
        $allData = RegistrationForm::where('order_status','Pending')->orWhere('order_status','Canceled')->orderBy('id','DESC')->get();
        //dd($allData);
        return view('admin.onlinepending')->with('alldata',$allData);
    }
    public function failed()
    {
        $failedData = RegistrationForm::where('order_status','Failed')->orderBy('id','desc')->get();
        //dd($allData);
        return view('admin.failed')->with('failedData',$failedData);
    }
    public function canceled()
    {
        $canceledData = RegistrationForm::where('order_status','Canceled')->orderBy('id','desc')->get();
    	//dd($allData);
    	return view('admin.canceled')->with('canceledData',$canceledData);
    }

    public function getdatabyid(Request $request)
    {
        $id =  $request->id;

        if ($request->type == 'temp') {
           return TempRegForm::with('hasBankStatement')->where('id',$id)->get()->first();
        }
    	//return DB::table('registration_forms')->where('id',$id)->get()->first();
        return RegistrationForm::with('hasBankStatement')->where('id',$id)->get()->first();
    }

    public function addnew()
    {
    	return view('admin.add')->with('message','Book Added');
    }

    public function save(Request $request)
    {
            //return $request->payment_method;

            return $this->directReg($request);
            
    }

    public function updatePaymentStatus(Request $request)
    {
        $id =  $request->id;
    	//return $request->all();
        $registration_form =  TempRegForm::where('id',$id)->get()->first();
        //return $registration_form;
        $registration_form->order_status = 'Complete';
        $registration_form->added_by = Auth::user()->name;
        $registration_form->save();

        $this->clone($registration_form);

        $registration_form->delete();

        //return redirect(route('alldata'))->with('message','Payment Status updated Successfully');
        return json_encode(['message'=>'success']);
    }

    public function clone($data){
        // get all Post attributes
        $new_data = $data->attributesToArray();
        // remove name and price attributes
        $new_data = array_except($new_data, ['id']);
        // create new Order based on Post's new_data
        $cloned_data =  RegistrationForm::create($new_data);

        $this->sendConfirmationMail($cloned_data);
        return $this->sendSms($cloned_data);
    }




    

    public function directReg($request){
            $order_id = $this->unique_order_id();
            //return $request->all();
            $fileNameWithExt    =  $request->file('image')->getClientOriginalName();
            $fileNameWithoutExt = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            $extension          = $request->file('image')->getClientOriginalExtension();
            $NewFileToStore     = $order_id.'.'.$extension;
            //return $NewFileToStore;
            $path               = $request->file('image')->storeAs('public/images/',$NewFileToStore);




            $reg_data = new RegistrationForm;


            $reg_data->name              = $request->name;
            $reg_data->nick_name         = $request->nick_name;
            $reg_data->order_id          = $order_id;
            $reg_data->order_status      = 'Complete';
            $reg_data->department        = $request->department;
            $reg_data->exam_session      = $request->exam_session;
            $reg_data->graduation_year   = $request->graduation_year;
            $reg_data->attachment        = $request->attachment;
            $reg_data->room_no           = $request->room_no;
            $reg_data->hall_duration     = $request->hall_duration;
            $reg_data->birthdate         = $request->birthdate;
            $reg_data->gender            = $request->gender;
            $reg_data->present_address   = $request->present_address;
            $reg_data->hobby             = $request->hobby;
            $reg_data->postcode          = $request->postcode;
            $reg_data->mobile_1          = $this->getDigitedNumber($request->mobile_1);
            $reg_data->mobile_2          = $request->mobile_2;
            $reg_data->email             = $request->email;
            $reg_data->occupation        = $request->occupation;
            $reg_data->position          = $request->position;
            $reg_data->organization      = $request->organization;
            $reg_data->spouse_name       = $request->spouse_name;
            $reg_data->spouse_profession = $request->spouse_profession;
            $reg_data->d1la              = $request->d1la;
            $reg_data->d1da              = $request->d1da;
            $reg_data->d2la              = $request->d2la;
            $reg_data->d2da              = $request->d2da;
            $reg_data->driver            = $request->driver;
            $reg_data->t_shirt           = $request->t_shirt;
            $reg_data->total_amount      = $request->total_amount;
            $reg_data->added_by          = $request->added_by;
            $reg_data->payment_method    = $request->payment_method;
            $reg_data->image             = $NewFileToStore;

            $reg_data->save();

            $this->saveQrCode($order_id);
            $this->sendConfirmationMail($reg_data);
            $this->sendSms($reg_data);

            //Session::put('payment_values.tran_id', $reg_data->order_id);

            //return $reg_data;
            return Redirect(Route('alldata'))->with('message','Added Successfully');

    }


    public function edit($id)
    {
        $data = RegistrationForm::find($id);

        //return $data;
        return view('admin.edit')->with('data',$data);
    }

    public function sendConfirmationMail($data){
        Mail::to($data['email'])->send(new SendPaymentConfirmationMail($data));
    }


    public function changes(){
        $alldata = SaveChangesByAdmin::all();
        return view('admin.changes')->with('alldata',$alldata);
    }
    


    public function saveChanges($new_data,$old_data,$comment = null)
    {
        
        $changed_old_value =  array_intersect_key($old_data, $new_data);
        //return $new_data;

        $record_changes             = new SaveChangesByAdmin;
        $record_changes->admin_name = Auth::user()->name;
        $record_changes->order_id   = $old_data['order_id'];
        $record_changes->old_data   = json_encode($changed_old_value);
        $record_changes->new_data   = json_encode($new_data);
        $record_changes->comment    = empty($comment) ? 'Ignor Amount changes if no participation details has changed' : $comment;
        $record_changes->save();
        
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

    public function saveQrCode($order_id)
    {
        $image = base64_encode(QrCode::format('png')->size(200)->generate($order_id)); // your base64 encoded
        //$image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $order_id.'.'.'png';
        \File::put(storage_path(). '/app/public/qrcodes/' . $imageName, base64_decode($image));
    }






}
