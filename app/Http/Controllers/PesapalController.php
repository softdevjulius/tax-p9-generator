<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Knox\Pesapal\Facades\Pesapal;
use Knox\Pesapal\OAuth\OAuthConsumer;
use Knox\Pesapal\OAuth\OAuthRequest;
use Knox\Pesapal\OAuth\OAuthSignatureMethod_HMAC_SHA1;

//use Knox\Pesapal\Pesapal;
class PesapalController extends Controller
{
    public function confirmation($trackingid, $status, $payment_method, $merchant_reference)
    {
        info(json_encode(compact("trackingid", "status", "payment_method", "merchant_reference")));
//        $payments = Payments::where('tracking',$trackingid)->first();
//        $payments -> payment_status = $status;
//        $payments -> payment_method = $payment_method;
//        $payments -> save();
    }
    public function api_link($path = null)
    {
        $live = 'https://www.pesapal.com/api/';
        $demo = 'https://demo.pesapal.com/api/';
        return (config('pesapal.is_live') ? $live : $demo) . $path;
    }

    public function initiatePayment(Request $request)
    {
        $params = [
            "amount" => $request->amount,
            "description" => "Payment",
            "type" => "MERCHANT",
            "reference" => $request->transaction_code??uniqid(),
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "currency" => "KES",
            "email" => $request->email,
            "phonenumber" => $request->phone_number,
            "width" => "400px",
            "height" => "600px",
        ];

        $token = NULL;

        $consumer_key = env("PESAPAL_KEY");//config('pesapal.consumer_key');

        $consumer_secret = env("PESAPAL_SECRET");//config('pesapal.consumer_secret');

        $signature_method = new OAuthSignatureMethod_HMAC_SHA1();

        $iframelink = $this->api_link('PostPesapalDirectOrderV4');

        $callback_url = route("generate_p9_pesapal_confirmation",['code' => $request['code']]); //redirect url, the page that will handle the response from pesapal.

        $post_xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
                        <PesapalDirectOrderInfo
                            xmlns:xsi=\"http://www.w3.org/2001/XMLSchemainstance\"
                            xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\"
                            Amount=\"" . $params['amount'] . "\"
                            Description=\"" . $params['description'] . "\"
                            Type=\"" . $params['type'] . "\"
                            Reference=\"" . $params['reference'] . "\"
                            FirstName=\"" . $params['first_name'] . "\"
                            LastName=\"" . $params['last_name'] . "\"
                            Currency=\"" . $params['currency'] . "\"
                            Email=\"" . $params['email'] . "\"
                            PhoneNumber=\"" . $params['phonenumber'] . "\"
                            xmlns=\"http://www.pesapal.com\" />";

        $post_xml = htmlentities($post_xml);
        $consumer = new OAuthConsumer($consumer_key, $consumer_secret);

        $iframe_src = OAuthRequest::from_consumer_and_token($consumer, $token, "GET", $iframelink, $params);

        $iframe_src->set_parameter("oauth_callback", $callback_url);

        $iframe_src->set_parameter("pesapal_request_data", $post_xml);


        $iframe_src->sign_request($signature_method, $consumer, $token);

        $iframe = '<iframe src="' . $iframe_src . '" width="' . $params['width'] . '" height="' . $params['height'] . '" scrolling="auto" frameBorder="0"> <p>Unable to load the payment page</p> </iframe>';

        return view('pesapal_make_payment', compact('iframe'));
    }

    public function paymentsuccess(Request $request)//just tells u payment has gone thru..but not confirmed
    {
        $trackingid = $request->input('tracking_id');
        $ref = $request->input('merchant_reference');

        $payments = Payment::where('transactionid', $ref)->first();
        $payments->trackingid = $trackingid;
        $payments->status = 'PENDING';
        $payments->save();
        //go back home
        $payments = Payment::all();
        return view('payments.business.home', compact('payments'));
    }
    //This method just tells u that there is a change in pesapal for your transaction..
    //u need to now query status..retrieve the change...CANCELLED? CONFIRMED?
    public function paymentconfirmation(Request $request)
    {
        $trackingid = $request->input('pesapal_transaction_tracking_id');
        $merchant_reference = $request->input('pesapal_merchant_reference');
        $pesapal_notification_type = $request->input('pesapal_notification_type');

        //use the above to retrieve payment status now..
        $this->checkpaymentstatus($trackingid, $merchant_reference, $pesapal_notification_type);
    }

    //Confirm status of transaction and update the DB
    public function checkpaymentstatus($trackingid, $merchant_reference, $pesapal_notification_type=null)
    {
        $status = Pesapal::getMerchantStatus($merchant_reference);
        dd($status);
//        $payments = Payment::where('trackingid', $trackingid)->first();
//        $payments->status = $status;
//        $payments->payment_method = "PESAPAL";//use the actual method though...
//        $payments->save();
        return "success";
    }
}
