<?php

namespace App\Http\Controllers;

use App\FoodRecord;
use App\Http\Requests;
use App\Http\Resources\FoodRecord as FoodRecordResource;
use App\Http\Resources\RegistrationForm as RegistrationFormResource;
use App\RegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodRecordController extends Controller
{
    public $order_id;
    public $registration_form;

    public function __construct(RegistrationForm $order_id)
    {
        $this->order_id = $order_id;
        $this->registration_form = new RegistrationForm;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $records = RegistrationForm::with('remainingToken')->get();
        $all_data =  $this->registration_form->getAllDetails();

        return RegistrationFormResource::collection($all_data);
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
    public function store(Request $request,$order_id)
    {
        // return $request->all();
        
        $check_if_exists = RegistrationForm::where('order_id',$order_id)->first();

        if ($check_if_exists == null) {
            abort(404);
        }

        $food_record             = new FoodRecord;
        $food_record->order_id   = $order_id;
        if ($request->day_num == '1') {
            $food_record->d1lar  = $request->lunch;
            $food_record->d1dar  = $request->dinner;
        }else{
            $food_record->d2lar  = $request->lunch;
            $food_record->d2dar  = $request->dinner;
            $food_record->driver_remaining = $request->driver;
        }

        $food_record->added_by = $request->added_by;
        $food_record->save();

        return new RegistrationFormResource($this->registration_form->getDetails($order_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($order_id)
    {
        $reg_record = $this->registration_form->getDetails($order_id);
        // $reg_record = RegistrationForm::with(['takenFoodRecord'])->where('order_id',$order_id)->first();

        if ($reg_record != NULL) {
            return new RegistrationFormResource($reg_record);
        }

        return abort(404);
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
    public function update(Request $request, $order_id)
    {
        return $request->all();
        if($request->isMethod('put') == false){
            //return ['message' => 'Request must be put'];
            abort(404);
        }

        $reg_record = RegistrationForm::where('order_id',$order_id)->first();
        if ($reg_record == NULL) {
            // return ['message' => 'There is no registration with this id'];
            abort(404);
        }


        $food_record = FoodRecord::where('order_id',$request->order_id)->first();

        if ($food_record == NULL) {
            $food_record  = new FoodRecord;
        }
        
        $food_record->order_id = $order_id;

        if ($request->day_num == '1') {
            $food_record->d1lar = $request->lunch;
            $food_record->d1dar = $request->dinner;
        }else{

            $food_record->d2lar = $request->lunch;
            $food_record->d2dar = $request->dinner;
            $food_record->driver_remaining = $request->driver;
        }

        $food_record->added_by = $request->added_by;

        if ($food_record->save()) {
            return new FoodRecordResource($food_record);
        }
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

    public function sumTotal($data)
    {
        # code...
    }

    public function takenFoodRecord($order_id)
    {
        $taken_food_record = FoodRecord::where('order_id',$order_id)
                            ->selectRaw('sum(d1lar) as d1la_taken')
                            ->selectRaw('sum(d1dar) as d1da_taken')
                            ->selectRaw('sum(d2lar) as d2la_taken')
                            ->selectRaw('sum(d2dar) as d2da_taken')
                            ->selectRaw('sum(driver_remaining) as driver_taken')
                            ->get();
    }
}
