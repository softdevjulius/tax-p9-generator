<?php

use App\Http\Controllers\{LoginController};
use Illuminate\Support\Facades\Route;

Route::match(['GET',"POST"],'login',[LoginController::class,'login'])->name("login");
Route::match(['GET',"POST"],'reset-password',[LoginController::class,'resetPassword'])->name("reset_password");
