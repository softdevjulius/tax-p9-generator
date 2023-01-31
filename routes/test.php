<?php

use Illuminate\Support\Facades\Route;

Route::get("/",function (){

    //generate pdf..
    $p9 = \App\Models\P9::query()->orderByDesc("id")->skip(1)->first();
//    return view("tax_return.p9_pdf",compact("p9"));
//    dd($data);
    $pdf = PDF::loadView("tax_return.p9_pdf",compact("p9"));

    return $pdf->download("p.pdf");


    dd("clsoer");


});
