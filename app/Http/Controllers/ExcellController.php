<?php

namespace App\Http\Controllers;

use App\CurrentStudent;
use App\RegistrationForm;
use App\SaveChangesByAdmin;
use App\TempRegForm;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcellController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function successTrxData(){

        $data = RegistrationForm::where('order_status','<>','Failed')->get()->toArray();


        return Excel::create('sbhaa_payment_success', function($excel) use ($data) {
            $excel->setTitle('Registration Data');
            $excel->sheet('Registration Data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');

    } 
    public function pendingBankData(){

        $data = TempRegForm::get()->toArray();


        return Excel::create('sbhaa_payment_pending_bank', function($excel) use ($data) {
            $excel->setTitle('Registration Data');
            $excel->sheet('Registration Data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');

    } 
    public function pendingOnlineData(){

        $data = RegistrationForm::where('order_status','Pending')->get()->toArray();


        return Excel::create('sbhaa_payment_pending_online', function($excel) use ($data) {
            $excel->setTitle('Registration Data');
            $excel->sheet('Registration Data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');

    } 
    public function failedOnlinedata(){

        $data = RegistrationForm::where('order_status','Failed')->get()->toArray();


        return Excel::create('sbhaa_payment_failed_online', function($excel) use ($data) {
            $excel->setTitle('Registration Data');
            $excel->sheet('Registration Data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');

    }
    public function canceledOnlineData(){

        $data = RegistrationForm::where('order_status','Canceled')->get()->toArray();


        return Excel::create('sbhaa_payment_canceled_online', function($excel) use ($data) {
            $excel->setTitle('Registration Data');
            $excel->sheet('Registration Data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');

    } 
    public function changesData(){

        $data = SaveChangesByAdmin::all()->toArray();


        return Excel::create('admin_changes_data', function($excel) use ($data) {
            $excel->setTitle('admin_changes_data');
            $excel->sheet('admin_changes_data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');

    } 

    public function currentStudent()
    {
        $data = CurrentStudent::all()->toArray();


        return Excel::create('current_student', function($excel) use ($data) {
            $excel->setTitle('Registration Data');
            $excel->sheet('Registration Data', function($sheet) use ($data)

            {

                $sheet->fromArray($data);

            });

        })->download('xlsx');
    }
}
