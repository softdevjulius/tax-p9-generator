<?php

namespace App\Http\Controllers;

use App\Models\P9;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StkCallbackUrlController extends Controller
{
    public function callbackUrl(Request $request)
    {
        $response = $api_result = \request()->input();
        info($response);
        $account = @$api_result['account_number'] ?? "null";
        $account = Str::lower($account);
        $code = @$api_result['code']??null;

        $p9 = P9::whereCode($account)->orWhere("code",$code)->firstOrFail();

        if (($api_result['Body']["stkCallback"])['ResultCode'] == 0) {

            $item = $api_result['Body']['stkCallback']['CallbackMetadata'];

            foreach ($item["Item"] as $item) {
                switch ($item['Name']) {
                    case "Amount":
                    {
                        $amount = $item['Value'];
                    }
                    case "MpesaReceiptNumber":
                    {
                        $transaction_code = $item['Value'];
                    }
                    case "PhoneNumber":
                    {
                        $phone_number = $item['Value'];
                    }
                }

            }

            $p9 -> update([
                "transaction_code" => $transaction_code,
                "amount_paid" => $amount,
                "mpesa_phone" => $phone_number,
            ]);

            //trigger the event,
            event(new \App\Events\P9ChargesPaidEvent('Mpesa Transaction was successfully',$code));

        }


        return 0;
    }
}
