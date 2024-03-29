<?php

use App\Http\Controllers\{AdminController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', [AdminController::class,'home'])->name('home');
Route::get('payment', [AdminController::class,'payment'])->name('payment');
Route::get('settings', [AdminController::class,'settings'])->name('settings');
Route::match(["GET","PATCH","PUT"],'settings-update/{id}', [AdminController::class,'settingsUpdate'])->name('settings_update');


//john from interswitch
