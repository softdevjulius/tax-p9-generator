<?php

use App\Http\Controllers\{BusinessController, GenerateP9Controller, PageController};
use Illuminate\Support\Facades\Route;

Route::get("",[PageController::class,'home'])->name("landing");

Route::get("generate-p9",[PageController::class,'generateP9'])->name("generate_p9");

Route::match(["GET","POST"],"paye-calculator",[PageController::class,'payeCalculator'])->name("paye_calculator");

Route::group(['prefix' => "generate-p9"],function (){
    Route::match(['GET',"POST"],'step-1',[GenerateP9Controller::class,'step1'])->name("generate_p9_step_1");
    Route::match(['GET',"POST"],'step-2',[GenerateP9Controller::class,'step2'])->name("generate_p9_step_2");
    Route::match(['GET',"POST"],'step-3',[GenerateP9Controller::class,'step3'])->name("generate_p9_step_3");
    Route::match(['GET',"POST"],'step-4',[GenerateP9Controller::class,'step4'])->name("generate_p9_step_4");
    Route::match(['GET',"POST"],'step-5',[GenerateP9Controller::class,'step5'])->name("generate_p9_step_5");
    Route::match(['GET',"POST"],'tax-preview',[GenerateP9Controller::class,'taxPreview'])->name("generate_p9_tax_preview");

});

Route::group(['prefix' => "business"],function (){
    Route::match(['GET',"POST"],'step-2',[BusinessController::class,'step2'])->name("business_step_2");
    Route::match(['GET',"POST"],'step-3',[BusinessController::class,'step3'])->name("business_step_3");
    Route::match(['GET',"POST"],'step-4',[BusinessController::class,'step4'])->name("business_step_4");
    Route::match(['GET',"POST"],'step-5',[BusinessController::class,'step5'])->name("business_step_5");
    Route::match(['GET',"POST"],'step-6',[BusinessController::class,'step6'])->name("business_step_6");

});
