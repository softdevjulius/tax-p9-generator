<?php


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
