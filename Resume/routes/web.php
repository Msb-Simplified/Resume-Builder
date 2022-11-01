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
    
    // php artisan config:cache
    // php artisan cache:clear
    // php artisan route:cache
    // php artisan route:clear
    // php artisan view:clear

Route::get('/', [HomeController::class,'homeview'])->name('homeview');
// Route::get('/', function () { return view('user.home');  });
Route::post('/signup', [UserSignupController::class,'userregistration'])->name('signup');
Route::post('/login', [UserLoginController::class,'userlogin'])->name('login');
Route::post('/logout', [UserLoginController::class,'userlogout'])->name('logout');


Route::get('/makecv', [CreateCvController::class,'makecv'])->name('makecv');
Route::get('/print/{username}/{id}', [PrintController::class,'print'])->name('print');



Route::post('/updateImage', [UpdateController::class,'updateImage'])->name('updateImage');
Route::post('/updateName', [UpdateController::class,'updateName'])->name('updateName');
Route::post('/updateTitle', [UpdateController::class,'updateName'])->name('updateTitle');
Route::post('/updateAbout', [UpdateController::class,'updateAbout'])
;
Route::post('/updateAddress', [UpdateController::class,'updateAbout']);




Route::get('/getAbout/{cvid}', [UpdateController::class,'get']);
Route::get('/getAddress/{cvid}', [UpdateController::class,'get']);
Route::get('/loadResumeData/{cvid}', [UpdateController::class,'loadAccountsData']);




Route::post('/accountDelete', [UpdateController::class,'accountDelete']);
Route::post('/updateAccount', [UpdateController::class,'updateAccount']);
Route::post('/addAccount', [UpdateController::class,'addAccount']);



Route::get('/loadLanguage/{cvid}', [UpdateController::class,'get']);
Route::post('/upadateLanguage', [UpdateController::class,'upadateLanguage']);



Route::get('/loadTools/{cvid}', [UpdateController::class,'get']);
Route::get('/loadEducation/{cvid}', [UpdateController::class,'loadEducation']);


Route::post('/upadateEducation', [UpdateController::class,'upadateEducation']);
Route::post('/addEducation', [UpdateController::class,'upadateEducation']);
Route::post('/deleteEducation', [UpdateController::class,'deleteEducation']);


Route::get('/getExperence/{cvid}', [UpdateController::class,'loadExperence']);
Route::post('/upadateEexperence', [UpdateController::class,'upadateEexperence']);
Route::post('/deleteExperence', [UpdateController::class,'deleteExperence']);
Route::post('/addExperence', [UpdateController::class,'upadateEexperence']);



Route::get('/loadSkills/{cvid}', [UpdateController::class,'loadSkills']);
Route::post('/updateSkill', [UpdateController::class,'updateSkill']);
Route::post('/addSkill', [UpdateController::class,'addSkill']);