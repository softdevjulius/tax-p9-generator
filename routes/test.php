<?php

use Illuminate\Support\Facades\Route;

Route::get("/",function (){

    (parse_str('foo[]=1&foo[]=2&foo[]=3',$results));

    dd($results);
    dd(urldecode("https://closer.com?coe=df&foo=bar"));

    dd(explode("&",urldecode("_token=c1co3W9ditkzhyzHzaS0QPdVGGKFiMx7c2n05zZy&code=B20C4A9A1F4&income_name%5B%5D=&income_amount%5B%5D=&income_expense_amount%5B%5D=&withholding_tax%5B%5D=&allowance_name%5B%5D=&allowance_amount%5B%5D=&deduction_name%5B%5D=&deduction_amount%5B%5D=&deduction_name%5B%5D=&deduction_amount%5B%5D=")));

    //generate pdf..
    $p9 = \App\Models\P9::query()->orderByDesc("id")->skip(1)->first();
//    return view("tax_return.p9_pdf",compact("p9"));
//    dd($data);
    $pdf = PDF::loadView("tax_return.p9_pdf",compact("p9"));

    return $pdf->download("p.pdf");


    dd("clsoer");


});
