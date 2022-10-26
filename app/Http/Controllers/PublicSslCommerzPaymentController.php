<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use App\Http\Controllers;
use App\RegistrationForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Mail\SendPaymentConfirmationMail;
use App\Library\SslCommerz\SslCommerzNotification;
//session_start();

class PublicSslCommerzPaymentController extends Controller
{

    public function index(Request $request)
    {

        # Here you have to receive all the order data to initate the payment.
        # Lets your oder trnsaction informations are saving in a table called "registration_forms"
        # In registration_forms table order uniq identity is "order_id","order_status" field contain status of the transaction, "total_amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $transaction_id = Session::get('payment_values.tran_id');
        $data = DB::table('registration_forms')->where('order_id', $transaction_id)->get()->first();
        //dd($data);


        # Here you have to receive all the order data to initate the payment.
        # Let's say, your oder transaction informations are saving in a table called "orders"
        # In "orders" table, order unique identity is "transaction_id". "status" field contain status of the transaction, "amount" is the order amount to be paid and "currency" is for storing Site Currency which will be checked with paid currency.

        $post_data = array();
        $post_data['total_amount'] = $data->total_amount;; # You cant not pay less than 10
        $post_data['currency'] = $data->currency;
        $post_data['tran_id'] = $data->order_id; // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name'] = $data->name;
        $post_data['cus_email'] = $data->email;
        $post_data['cus_add1'] = $data->present_address;
        $post_data['cus_add2'] = "";
        $post_data['cus_city'] = "Dhaka";
        $post_data['cus_state'] = "Dhaka";
        $post_data['cus_postcode'] = $data->postcode;
        $post_data['cus_country'] = "Bangladesh";
        $post_data['cus_phone'] = $data->mobile_1;
        $post_data['cus_fax'] = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name'] = "Store Test";
        $post_data['ship_add1'] = "Dhaka";
        $post_data['ship_add2'] = "Dhaka";
        $post_data['ship_city'] = "Dhaka";
        $post_data['ship_state'] = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone'] = "";
        $post_data['ship_country'] = "Bangladesh";

        $post_data['shipping_method'] = "NO";
        $post_data['product_name'] = "Reunion Registration";
        $post_data['product_category'] = "Virtual";
        $post_data['product_profile'] = "Virtual";


        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "";
        $post_data['value_b'] = "";
        $post_data['value_c'] = "";
        $post_data['value_d'] = "";


        #Before  going to initiate the payment order status need to insert or update as Pending.
        $update_product = DB::table('registration_forms')
        ->where('order_id', $post_data['tran_id'])
        ->update(['order_status' => 'Pending', 'currency' => $post_data['currency']]);

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }

    public function success(Request $request)
    {

        echo "Transaction is Successful";

        $sslc = new SSLCommerz();
        #Start to received these value from session. which was saved in index function.
        //$tran_id = $_SESSION['payment_values']['tran_id'];
        $tran_id = $request->input('tran_id');
        // $tran_id = Session::get('payment_values.tran_id');
        #End to received these value from session. which was saved in index function.

        #Check order status in order tabel against the transaction id or order id.
        $order_detials = DB::table('registration_forms')
            ->where('order_id', $tran_id)
        ->select('order_id', 'order_status', 'currency', 'total_amount')->get()->first();


        $sslc = new SslCommerzNotification();

        if ($order_detials->order_status == 'Pending') {
            // $validation = $sslc->orderValidate($tran_id, $order_detials->total_amount, $order_detials->currency, $request->all());
            $validation = $sslc->orderValidate($request->all(), $tran_id, $order_detials->total_amount, $order_detials->currency);
            if ($validation == TRUE) {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel. Here you need to update order status
                in order table as Processing or Complete.
                Here you can also sent sms or email for successfull transaction to customer
                */
                $update_product = DB::table('registration_forms')
                ->where('order_id', $tran_id)
                ->update(['order_status' => 'Processing']);

                $transaction_id = Session::get('payment_values.tran_id');
                $data = DB::table('registration_forms')->where('order_id', $transaction_id)->get()->first();

                $this->sendConfirmationMail($data);
                // $this->sendSms($data);

                echo "<br >Transaction is successfully Complete. <br> goto <a href=" . route('index') . ">Home</a>";
            } else {
                /*
                That means IPN did not work or IPN URL was not set in your merchant panel and Transation validation failed.
                Here you need to update order status as Failed in order table.
                */
                $update_product = DB::table('registration_forms')
                ->where('order_id', $tran_id)
                ->update(['order_status' => 'Failed']);
                echo "<br>validation Fail. Do not worry. If transaction is successful then the system will send you confirmation email within 15 minutes.";
            }
        } else if ($order_detials->order_status == 'Processing' || $order_detials->order_status == 'Complete') {
            /*
             That means through IPN Order status already updated. Now you can just show the customer that transaction is completed. No need to udate database.
             */
            echo "<br >Transaction is successfully Complete. <br> goto <a href=" . route('index') . ">Home</a>";
        } else {
            #That means something wrong happened. You can redirect customer to your product page.
            echo "Invalid Transaction";
        }
    }
    public function fail(Request $request)
    {
        // $tran_id = $_SESSION['payment_values']['tran_id'];
        $tran_id = Session::get('payment_values.tran_id');
        $order_detials = DB::table('registration_forms')
        ->where('order_id', $tran_id)
            ->select('order_id', 'order_status', 'currency', 'total_amount')->first();

        if ($order_detials->order_status == 'Pending') {
            $update_product = DB::table('registration_forms')
            ->where('order_id', $tran_id)
            ->update(['order_status' => 'Failed']);
            echo "Transaction is Falied<br> goto <a href=" . route('index') . ">Home</a>";
        } else if ($order_detials->order_status == 'Processing' || $order_detials->order_status == 'Complete') {
            echo "Transaction is already Successful <br> goto <a href=" . route('index') . ">Home</a>";
        } else {
            echo "Transaction is Invalid<br> goto <a href=" . route('index') . ">Home</a>";
        }
    }

    public function cancel(Request $request)
    {
        //$tran_id = $_SESSION['payment_values']['tran_id'];
        $tran_id = Session::get('payment_values.tran_id');

        $order_detials = DB::table('registration_forms')
            ->where('order_id', $tran_id)
            ->select('order_id', 'order_status', 'currency', 'total_amount')->first();

        if ($order_detials->order_status == 'Pending') {
            $update_product = DB::table('registration_forms')
            ->where('order_id', $tran_id)
            ->update(['order_status' => 'Canceled']);
            echo "Transaction is Cancel<br> goto <a href=" . route('index') . ">Home</a>";
        } else if ($order_detials->order_status == 'Processing' || $order_detials->order_status == 'Complete') {
            echo "Transaction is already Successful <br> goto <a href=" . route('index') . ">Home</a>";
        } else {
            echo "Transaction is Invalid<br> goto <a href=" . route('index') . ">Home</a>";
        }
    }
    public function ipn(Request $request)
    {
        //dd($request->input('tran_id'));
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) #Check transation id is posted or not.
        {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = DB::table('registration_forms')
            ->where('order_id', $tran_id)
            ->select('order_id', 'order_status', 'currency', 'total_amount')->get()->first();

            if ($order_details->order_status == 'Pending') {
                $sslc = new SSLCommerz();
                $validation = $sslc->orderValidate($tran_id, $order_details->total_amount, $order_details->currency, $request->all());
                if ($validation == TRUE) {
                    /*
                        That means IPN worked. Here you need to update order status
                        in order table as Processing or Complete.
                        Here you can also sent sms or email for successfull transaction to customer
                        */
                    $update_product = DB::table('registration_forms')
                        ->where('order_id', $tran_id)
                        ->update(['order_status' => 'Processing']);

                    $transaction_id = Session::get('payment_values.tran_id');
                    $data = DB::table('registration_forms')->where('order_id', $transaction_id)->get()->first();

                    $this->sendConfirmationMail($data);
                    $this->sendSms($data);



                    echo "Transaction is successfully Complete ";
                } else {
                    /*
                        That means IPN worked, but Transation validation failed.
                        Here you need to update order status as Failed in order table.
                        */
                    $update_product = DB::table('registration_forms')
                        ->where('order_id', $tran_id)
                        ->update(['order_status' => 'Failed']);

                    echo "validation Fail";
                }
            } else if ($order_details->order_status == 'Processing' || $order_details->order_status == 'Complete') {

                #That means Order status already updated. No need to udate database.

                echo "Transaction is already successfully Complete";
            } else {
                #That means something wrong happened. You can redirect customer to your product page.

                echo "Invalid Transaction";
            }
        } else {
            echo "Inavalid Data";
        }
    }

    public function sendConfirmationMail($data)
    {
        Mail::to($data->email)->send(new SendPaymentConfirmationMail($data));
    }

    public function sendSms($data)
    {

        $message  = $data->name . ', your SBHAA Program Registration has been completed';
        $message .= '.%0aYour Application ID is: ' . $data->order_id;
        $message .= '.%0aAmount received: ' . $data->total_amount;
        $message .= '.%0aPayment method: ' . $data->payment_method;
        $message .= '.%0aT-shirt Size: ' . $data->t_shirt;
        $message .= '%0a%0a14th February %0aLunch: ' . $data->d1la;
        $message .= '%0aDinner: ' . $data->d1da;
        $message .= '%0a%0a15th February%0aLunch: ' . $data->d2la;
        $message .= '%0aGrand Dinner: ' . $data->d2da;
        $message .= '%0aDrivers Dinner: ' . $data->driver;


        $client = new GuzzleHttp\Client();
        $res = $client->get('http://166.62.16.132/A_SMS/smssend.php?phone=' . $this->getDigitedNumber($data->mobile_1) . '&text=' . $message . '&user=sbhaa&password=sbhsms2019');
        //return $res->getStatusCode();
    }


    public function getDigitedNumber($mobile)
    {
        if (strlen($mobile) > 11) {
            if (substr($mobile, 0, 3) == '+88') {
                return substr($mobile, -11);
            } elseif (substr($mobile, 0, 4) == '0088') {
                return substr($mobile, -11);
            } else {
                return $mobile;
            }
        }
        return $mobile;
    }
}
