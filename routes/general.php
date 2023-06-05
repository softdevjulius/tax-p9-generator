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
    Route::match(['GET',"POST"],'step-4-bank-detail',[GenerateP9Controller::class,'step4BankDetail'])->name("generate_p9_step_4_bank_detail");
    Route::match(['GET',"POST"],'step-4-auditor',[GenerateP9Controller::class,'step4Auditor'])->name("generate_p9_step_4_auditor");
    Route::match(['GET',"POST"],'step-4-landlord',[GenerateP9Controller::class,'step4Landlord'])->name("generate_p9_step_4_landlord");
    Route::match(['GET',"POST"],'step-4-landlord-wife',[GenerateP9Controller::class,'step4LandlordWife'])->name("generate_p9_step_4_landlord_wife");
    Route::match(['GET',"POST"],'step-4-tenant',[GenerateP9Controller::class,'step4Tenant'])->name("generate_p9_step_4_tenant");
    Route::match(['GET',"POST"],'step-4-add-tenant',[GenerateP9Controller::class,'step4AddTenant'])->name("generate_p9_step_4_add_tenant");
    Route::match(['GET',"POST"],'step-4-delete-tenant/{id}',[GenerateP9Controller::class,'step4DeleteTenant'])->name("generate_p9_step_4_delete_tenant");
    Route::match(['GET',"POST"],'step-4-tenant-wife',[GenerateP9Controller::class,'step4TenantWife'])->name("generate_p9_step_4_tenant_wife");
    Route::match(['GET',"POST"],'step-4-add-tenant-wife',[GenerateP9Controller::class,'step4AddTenantWife'])->name("generate_p9_step_4_add_tenant_wife");
    Route::match(['GET',"POST"],'step-4-delete-tenant-wife/{id}',[GenerateP9Controller::class,'step4DeleteTenantWife'])->name("generate_p9_step_4_delete_tenant_wife");
    Route::match(['GET',"POST"],'step-5',[GenerateP9Controller::class,'step5'])->name("generate_p9_step_5");
    Route::match(['GET',"POST"],'step-6',[GenerateP9Controller::class,'step6'])->name("generate_p9_step_6");
    Route::match(['GET',"POST"],'step-7',[GenerateP9Controller::class,'step7'])->name("generate_p9_step_7");
    Route::match(['GET',"POST"],'tax-preview',[GenerateP9Controller::class,'taxPreview'])->name("generate_p9_tax_preview");
    Route::match(['PUT',"POST"],"customize-basic-salary",[GenerateP9Controller::class,'customizeBasicSalary'])->name("generate_p9_customize_basic_salary");

    Route::match(['GET',"POST"],'send-email',[GenerateP9Controller::class,'sendEmail'])->name("generate_p9_send_email");
    Route::match(['GET'],'download-p9/{id}',[GenerateP9Controller::class,'downloadP9'])->name("generate_p9_download_p9");

});

Route::group(['prefix' => "business"],function (){
    Route::match(['GET',"POST"],'step-2',[BusinessController::class,'step2'])->name("business_step_2");
    Route::match(['GET',"POST"],'step-3',[BusinessController::class,'step3'])->name("business_step_3");
    Route::match(['GET',"POST"],'step-4',[BusinessController::class,'step4'])->name("business_step_4");
    Route::match(['GET',"POST"],'step-5',[BusinessController::class,'step5'])->name("business_step_5");
    Route::match(['GET',"POST"],'step-6',[BusinessController::class,'step6'])->name("business_step_6");

});
