<?php

namespace App\Http\Controllers;

use App\TempRegForm;
use App\CurrentStudent;
use App\Exports\AdminChangesExport;
use App\Exports\CancelledOnlineExport;
use App\Exports\CurrentStudentExport;
use App\Exports\FailedOnlineExport;
use App\Exports\PendingBankExport;
use App\Exports\PendingOnlineExport;
use App\RegistrationForm;
use App\SaveChangesByAdmin;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcellController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function successTrxData(){

        // $data = RegistrationForm::where('order_status','<>','Failed')->get()->toArray();


        // return Excel::create('sbhaa_payment_success', function($excel) use ($data) {
        //     $excel->setTitle('Registration Data');
        //     $excel->sheet('Registration Data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);

        //     });

        // })->download('xlsx');

        return Excel::download(new UsersExport, 'sbhaa_payment_success.xlsx');
    }
    public function pendingBankData(){

        // $data = TempRegForm::get()->toArray();


        // return Excel::create('sbhaa_payment_pending_bank', function($excel) use ($data) {
        //     $excel->setTitle('Registration Data');
        //     $excel->sheet('Registration Data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);
        //     });
        // })->download('xlsx');

        return Excel::download(new PendingBankExport, 'sbhaa_payment_pending_bank.xlsx');
    }
    public function pendingOnlineData(){

        return Excel::download(new PendingOnlineExport, 'sbhaa_payment_pending_online.xlsx');

        // $data = RegistrationForm::where('order_status','Pending')->get()->toArray();


        // return Excel::create('sbhaa_payment_pending_online', function($excel) use ($data) {
        //     $excel->setTitle('Registration Data');
        //     $excel->sheet('Registration Data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);
        //     });
        // })->download('xlsx');
    }
    public function failedOnlinedata()
    {


        return Excel::download(new FailedOnlineExport, 'sbhaa_payment_failed_online.xlsx');

        // $data = RegistrationForm::where('order_status','Failed')->get()->toArray();


        // return Excel::create('sbhaa_payment_failed_online', function($excel) use ($data) {
        //     $excel->setTitle('Registration Data');
        //     $excel->sheet('Registration Data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);

        //     });

        // })->download('xlsx');

    }
    public function canceledOnlineData(){

        return Excel::download(new CancelledOnlineExport, 'sbhaa_payment_canceled_online.xlsx');

        // $data = RegistrationForm::where('order_status','Canceled')->get()->toArray();


        // return Excel::create('sbhaa_payment_canceled_online', function($excel) use ($data) {
        //     $excel->setTitle('Registration Data');
        //     $excel->sheet('Registration Data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);
        //     });
        // })->download('xlsx');
    }
    public function changesData(){

        return Excel::download(new AdminChangesExport, 'admin_changes_data.xlsx');


        // $data = SaveChangesByAdmin::all()->toArray();


        // return Excel::create('admin_changes_data', function($excel) use ($data) {
        //     $excel->setTitle('admin_changes_data');
        //     $excel->sheet('admin_changes_data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);
        //     });
        // })->download('xlsx');
    }

    public function currentStudent()
    {
        return Excel::download(new CurrentStudentExport, 'current_student.xlsx');


        // $data = CurrentStudent::all()->toArray();


        // return Excel::create('current_student', function($excel) use ($data) {
        //     $excel->setTitle('Registration Data');
        //     $excel->sheet('Registration Data', function($sheet) use ($data)

        //     {

        //         $sheet->fromArray($data);

        //     });

        // })->download('xlsx');
    }
}