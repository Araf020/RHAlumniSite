<?php

namespace App\Http\Controllers;

use App\RegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingEntryController extends Controller
{
    public function index()
    {
    	$alldata = DB::table('pending_entry')->orderBy('id','desc')->get();
    	return view('admin.moved')->with('alldata',$alldata);
    }

    public function updatePaymentStatus(Request $request)
    {
        $id =  $request->id;
    	//return $request->all();
        $registration_form =  DB::table('pending_entry')->where('id',$id)->update(['order_status'=>'Processing']);
        $registration_form =  DB::table('pending_entry')->where('id',$id)->first();
        $this->clone($registration_form);
       	DB::table('pending_entry')->where('id',$id)->delete();

        //return redirect(route('alldata'))->with('message','Payment Status updated Successfully');
        return json_encode(['message'=>'success']);
    }

    public function clone($data){
        // get all Post attributes
        $new_data = @json_decode(json_encode($data), true);
        // dd();
        // remove name and price attributes
        $new_data = array_except($new_data, ['id']);
        // create new Order based on Post's new_data
        $cloned_data =  RegistrationForm::create($new_data);

        // $this->sendConfirmationMail($cloned_data);
        // return $this->sendSms($cloned_data);
    }

    public function getdatabyid(Request $request)
    {
    	$data =  DB::table('pending_entry')->where('id',$request->id)->get()->first();
    	return json_encode($data);
    }

}
