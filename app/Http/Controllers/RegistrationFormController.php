<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use App\TempRegForm;
use App\BankStatement;
use App\RegistrationForm;
use App\SaveChangesByAdmin;
use Illuminate\Http\Request;
use App\Mail\BankPaymentInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegistrationFormController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['save','unique_order_id','directReg','tempRegForm','checkId','updateFormStatus','checkPaymentStatus','deposite','payment_status','getStatusDataById','getDigitedNumber','checkPhoneNo','saveQrCode']);
        $this->middleware('auth')->only(['edit','update']);
    }

    public function save(Request $request)
    {
    	//return $request->all();

        if ($request->payment_method == 'online') {
            return $this->directReg($request);
        }else{
            return $this->tempRegForm($request);
        }

    }


    public function unique_order_id(){
        $prefix = 'RH';
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

    public function payment_status(){
        return view('user.payment_status');
    }

    public function directReg($request){
            $order_id = $this->unique_order_id();
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
            $reg_data->order_status      = 'Pending';
            $reg_data->department        = $request->department;
            $reg_data->exam_session      = $request->entrance_batch;
            $reg_data->graduation_year   = $request->graduation_year;
            $reg_data->attachment        = $request->attachment;
            $reg_data->room_no           = $request->room_no;
            $reg_data->hall_duration     = $request->hall_duration;
            $reg_data->birthdate         = $request->birthdate;
            $reg_data->gender            = 'male';
            $reg_data->present_address   = $request->present_address;
            $reg_data->hobby             = $request->hobby;
            $reg_data->postcode          = 1000;
            $reg_data->mobile_1          = $this->getDigitedNumber($request->mobile_1);
            $reg_data->mobile_2          = $request->mobile_2;
            $reg_data->email             = $request->email;
            $reg_data->occupation        = $request->occupation;
            $reg_data->position          = $request->position;
            $reg_data->organization      = $request->organization;
            $reg_data->spouse_name       = $request->spouse_name;
            // $reg_data->spouse_profession = $request->spouse_profession;
            // $reg_data->d1la              = $request->d1la;
            $reg_data->d1la              = 0;
            // $reg_data->d1da              = $request->d1da;
            $reg_data->d1da              = 1; //as per client request
            $reg_data->d2la              = $request->d2la;
            $reg_data->d2da              = $request->d2da;
            // $reg_data->driver            = 1;
            $reg_data->driver            = $request->d1da; //  as per client request

            $reg_data->t_shirt           = $request->t_shirt;
            $reg_data->total_amount      = $request->total_amount;
            $reg_data->added_by          = $request->added_by;
            $reg_data->payment_method    = $request->payment_method;
            $reg_data->image             = $NewFileToStore;

            $reg_data->save();

            Session::put('payment_values.tran_id', $reg_data->order_id);
            // $this->saveQrCode($order_id);

        //return $reg_data;
        return redirect(route('pay'));

    }

    public function tempRegForm($request){
                //return $request->all();
                $order_id = $this->unique_order_id();

                $fileNameWithExt    =  $request->file('image')->getClientOriginalName();
                $fileNameWithoutExt = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
                $extension          = $request->file('image')->getClientOriginalExtension();
                $NewFileToStore     = $order_id.'.'.$extension;
                //return $NewFileToStore;
                $path               = $request->file('image')->storeAs('public/images/',$NewFileToStore);




                $reg_data = new TempRegForm;


                $reg_data->name              = $request->name;
                $reg_data->nick_name         = $request->nick_name;
                $reg_data->order_id          = $order_id;
                $reg_data->order_status      = 'Pending';
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

                Session::put('payment_values.tran_id', $reg_data->order_id);
                // $this->saveQrCode($order_id);
                $this->sendBankInfo($reg_data);
                // $this->sendBankSms($reg_data);

                //return $reg_data;
                return redirect(route('deposite',$reg_data->order_id));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = RegistrationForm::find($id);

        //return $data;
        return view('admin.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();

         $reg_data = RegistrationForm::find($id);
         $old_image  = $reg_data->image;

        //dd ( $request->hasFile('image'));

         if ($request->hasFile('image')) {
             //delete old image
             Storage::delete('public/images/'.$old_image);
             //retrive new file data
             $fileNameWithExt    =  $request->file('image')->getClientOriginalName();
             $fileNameWithoutExt = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
             $extension          = $request->file('image')->getClientOriginalExtension();
             $NewFileToStore     = $reg_data->order_id.'.'.$extension;
             //return $NewFileToStore;
             $path               = $request->file('image')->storeAs('public/images/',$NewFileToStore);
         }else{
             $NewFileToStore     = $reg_data->image;
         }

        $reg_data->name              = $request->name;
        $reg_data->nick_name         = $request->nick_name;
        $reg_data->order_status      = $request->order_status;
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
        $reg_data->payment_method    = $request->payment_method;
        $reg_data->image             = $NewFileToStore;

        $this->saveChanges($reg_data->getDirty(),$reg_data->getOriginal());

         $reg_data->save();

         //return $reg_data;
         return redirect(route('alldata'))->with('message','Updated successfully');


    }

    public function checkId(Request $req){
        //return $req->all();
        $data = DB::table('temp_reg_forms')->where('email',$req->email_tran_id)->orWhere('order_id',strtoupper($req->email_tran_id))->get()->count();
        return ($data == 1) ? 'true' : 'false';
    }

    public function checkPhoneNo(Request $request){
       $registration_form = RegistrationForm::where('mobile_1','like','%'.$this->getDigitedNumber($request->mobile_number).'%')
                                            ->orWhere('mobile_2','like','%'.$this->getDigitedNumber($request->mobile_number).'%');

       $temp_form  = TempRegForm::where('mobile_1','like','%'.$this->getDigitedNumber($request->mobile_number).'%')
                                ->orWhere('mobile_2','like','%'.$this->getDigitedNumber($request->mobile_number).'%');

       $results = $registration_form->union($temp_form)
                                    ->orderBy('created_at','desc');
        $results = $results->get()->count();

       return ($results > 0) ? ['message'=>'There is an appliction with this number. Please provide another number'] : ['message'=>'ok'];
    }

    public function updateFormStatus(Request $req){
        //$id =  $request->id;
        //return $req->all();

        $registration_form =  TempRegForm::where('mobile_1','like','%'.$this->getDigitedNumber($req->email_tran_id).'%')->orWhere('order_id',strtoupper($req->email_tran_id))->get()->first();
        //return $registration_form;
        if(empty($registration_form)){
            //check if already submitted the bank statement and verified by admin
            $checkIfSubmitted = RegistrationForm::where('mobile_1','like','%'.$this->getDigitedNumber($req->email_tran_id).'%')->orWhere('order_id',strtoupper($req->email_tran_id))->get()->first();
            //return $checkIfSubmitted;

            if (empty($checkIfSubmitted)) {
                return ['message'=>'We could not find any order statement with these credentials.Please check your credentials or contact admin'];
            }elseif($checkIfSubmitted->payment_method != 'bank'){
                return ['message'=>'Your payment method is not through bank.'];
            }elseif($checkIfSubmitted->order_status == 'Complete'){
                return ['message'=>'Your Payment has been approved'];
            }else{
                $checkAlreadyExistBankInfo = BankStatement::where('order_id',$checkIfSubmitted->order_id)->count();
                if ($checkAlreadyExistBankInfo > 0) {
                    return ['message'=>'You have already submitted your bank payment statement'];
                }

            }
        }

        $checkAlreadyExistBankInfo = BankStatement::where('order_id',$registration_form->order_id)->count();
        if ($checkAlreadyExistBankInfo > 0) {
            return ['message'=>'You have already submitted your bank payment statement'];
        }
        //return $registration_form;
        $registration_form->order_status = 'Pending Admin Verification';
        $registration_form->save();

        $bankStatement               = new BankStatement;
        $bankStatement->bank_name    = $req->bank_name;
        $bankStatement->bank_branch  = $req->bank_branch;
        $bankStatement->payment_date = $req->payment_date;
        $bankStatement->scroll_no    = $req->scroll_no;
        $bankStatement->order_id     = $registration_form->order_id;
        $bankStatement->save();



        return ['message'=>'Your payment status has been updated and will be verified by an admin'];
    }


    public function checkPaymentStatus(Request $request){
        $registration_form = RegistrationForm::where('email',$request->email_tran_id)
                                               ->orWhere('order_id',strtoupper($request->email_tran_id));

        $temp_form  = TempRegForm::where('email',$request->email_tran_id)
                                   ->orWhere('order_id',strtoupper($request->email_tran_id));

        $results = $registration_form->union($temp_form)
                                     ->orderBy('created_at','desc');;
        $results = $results->get()->first();

        return ($results) ? $results : ['message'=>'there is no statement with this credential'];
    }

    public function deposite($order_id = null){
        if ($order_id == null) {
            $order_id = Session::get('payment_values.tran_id');
        }
            $data = DB::table('temp_reg_forms')->where('order_id',$order_id)->get()->first();

            return view('user.deposite')->with('data',$data);
    }

    public function getStatusDataById(Request $request)
    {
        //return $request->all();
        $registration_form = RegistrationForm::with('hasBankStatement')
                                                ->where('mobile_1','like','%'.$this->getDigitedNumber($request->email_tran_id).'%')
                                                ->orWhere('order_id',strtoupper($request->email_tran_id));

        $temp_form  = TempRegForm::with('hasBankStatement')
                                    ->where('mobile_1','like','%'.$this->getDigitedNumber($request->email_tran_id).'%')
                                    ->orWhere('order_id',strtoupper($request->email_tran_id));

        $results = $registration_form->union($temp_form)
                                     ->orderBy('created_at','desc');;
        $results = $results->get()->first();

        return ($results) ? $results : ['message'=>'there is no statement with this credential'];
    }

    public function getDigitedNumber($mobile)
    {
        if (strlen($mobile) > 11) {
            if (substr($mobile, 0, 3) == '+88')
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

    public function saveChanges($new_data,$old_data)
    {

        $changed_old_value =  array_intersect_key($old_data, $new_data);
        //return $new_data;

        $record_changes             = new SaveChangesByAdmin;
        $record_changes->admin_name = Auth::user()->name;
        $record_changes->order_id   = $old_data['order_id'];
        $record_changes->old_data   = json_encode($changed_old_value);
        $record_changes->new_data   = json_encode($new_data);
        $record_changes->comment    = 'Ignor Amount changes if no participation details has changed';
        $record_changes->save();

    }


    public function saveQrCode($order_id)
    {
        $image = base64_encode(QrCode::format('png')->size(200)->generate($order_id)); // your base64 encoded
        //$image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = $order_id.'.'.'png';
        File::put(storage_path() . '/app/public/qrcodes/' . $imageName, base64_decode($image));
        // Storage::put($article->slug . 'jpg', $request->file('file_field'));
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
}
