<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserSignupController extends Controller
{
    public function userregistration(Request $request){
        $count = User::where('username',$request->username)->count();
        if($count > 0){
            $notification = array(
                'message' => "Username Already exits !",
                'alert' => 'error'
            );
            return $notification;
        }else{

            User::insert([
                'username'  =>  $request->username,
                'password' => Hash::make($request->password)
            ]);
            $notification = array(
                'message' => "Registration Compleate",
                'alert' => 'success'
            );
            return $notification;
        }

    }
}
