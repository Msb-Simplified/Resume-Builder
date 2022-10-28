<?php

use App\Http\Controllers\CreateCvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\UserSignupController;
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


Route::get('/', [HomeController::class,'homeview'])->name('homeview');
// Route::get('/', function () { return view('user.home');  });
Route::post('/signup', [UserSignupController::class,'userregistration'])->name('signup');
Route::post('/login', [UserLoginController::class,'userlogin'])->name('login');
Route::post('/logout', [UserLoginController::class,'userlogout'])->name('logout');


Route::get('/makecv', [CreateCvController::class,'makecv'])->name('makecv');
Route::get('/print/{username}/{id}', [PrintController::class,'print'])->name('print');



Route::post('/updateImage', [UpdateController::class,'updateImage'])->name('updateImage');