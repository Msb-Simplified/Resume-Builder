<?php

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

Route::get('/', function () { return view('user.home');  });
Route::post('/signup', [UserSignupController::class,'userregistration'])->name('signup');
Route::post('/login', [UserLoginController::class,'userlogin'])->name('login');
