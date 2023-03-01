<?php


use Safaricom\Mpesa\Mpesa;

if (!function_exists("is_local"))
{
    function is_local():bool{
        return !in_array(env("APP_ENV",'production'),['live','production']);
    }
}


if (!function_exists("format_phone_number"))
{
    function format_phone_number($phone_number,$country_code="254",$should_pre_append_plus=false):string{

        return ($should_pre_append_plus?"+":"").($country_code) . substr($phone_number,-9);
    }
}


if (!function_exists("trigger_mpesa_stk_push")){
    function trigger_mpesa_stk_push($phone_number,$amount,$account_number,$code=null){

        $customerNo = format_phone_number($phone_number);

        $queryString = "?account_number=$account_number&code=$code";

        $response = ((new Mpesa())->STKPushSimulation(
            env("MPESA_PAYBILL_NUMBER"),
            env("LIPANAMPESAPASSKEY"),
            'CustomerPayBillOnline',
            ceil($amount),
            $customerNo,
            env("MPESA_PAYBILL_NUMBER"),
            $customerNo,
            route("api_stk_callback_url").$queryString,
//            "https://supplier.advances.co.ke/api/payment/stk-callback-url".$queryString,
            $account_number,
            "service payment",
            'repayment for service'));

//        info($response);

        return $response;
    }
}
