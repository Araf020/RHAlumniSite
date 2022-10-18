<?php

namespace App\Http\Controllers;

use App\SaveChangesByAdmin;
use App\TempRegForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TempRegFormController extends Controller
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = TempRegForm::find($id);

        //return $data;
        return view('admin.tempedit')->with('data',$data);
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

         $reg_data = TempRegForm::find($id);
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
        $reg_data->added_by          = $request->added_by;
        $reg_data->payment_method    = $request->payment_method;
        $reg_data->image             = $NewFileToStore;

         //return $reg_data->getOriginal();
        $this->saveChanges($reg_data->getDirty(),$reg_data->getOriginal());
        $reg_data->save();

        return redirect(route('pending'))->with('message','Updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    
}
