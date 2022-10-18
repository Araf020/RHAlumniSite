<?php

namespace App\Http\Controllers;

use App\CurrentStudent;
use Illuminate\Http\Request;
use DB;

class CurrentStudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['currentStudent']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.currentstdn');
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
        // return $request->all();
        $student_id = $this->studentIdWithoutPrefix($request->student_id);
        $check_duplicate = CurrentStudent::where('email',$request->email)->orWhere('phone',$request->phone)->orWhere('student_id',$request->student_id)->first();
        if($check_duplicate != null){
            return 'Duplicate Entry. Please Check again, or contact admin.';
        }

        $check_2 = DB::table('userdatas')->where([['student_id','like','%'.$student_id.'%'],['hall_name','=','Sher-e-Bangla Hall']])->get()->first();
        if($check_2 == null){
            return 'You are not from SBH.';
        }

        if(CurrentStudent::create($request->all())){
            return 'Successfully Registered for Programe.';
        }else{
            return 'There was an error. Please try again';
        }
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
        //
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
        //
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

    public function validateStudentId(Request $request)
    {
        $student_id = $this->studentIdWithoutPrefix($request->student_id);
        $check = CurrentStudent::where('student_id',$student_id)->first();

        if($check != null){
            return 1;
        }else{
            $check_2 = DB::table('userdatas')->where([['student_id','like','%'.$student_id.'%'],['hall_name','=','Sher-e-Bangla Hall']])->get()->first();
            if($check_2 != null){
                return 0;
            }else{
                return 1;
            }
            
        }
    }

    public function validatePhone(Request $request)
    {
        $check = CurrentStudent::where('phone',$request->phone)->first();

        if($check != null){
            return 1;
        }else{
            return 0;
        }
    }

    public function validateEmail(Request $request)
    {
        $check = CurrentStudent::where('email',$request->email)->first();

        if($check != null){
            return 1;
        }else{
            return 0;
        }
    }

    public function studentIdWithoutPrefix($student_id){
        $student_id = strtolower($student_id);
        return (substr($student_id,0,1) == 's') ? substr($student_id,3) : $student_id;
    }

    public function currentStudent()
    {
        $data = CurrentStudent::orderBy('id','desc')->get();
        return view('admin.current',compact('data'));
    }
}
