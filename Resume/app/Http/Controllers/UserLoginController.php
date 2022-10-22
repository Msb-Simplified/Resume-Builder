<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserLoginController extends Controller
{
    public function userlogin(Request $request){  
        $username = User::where('username',$request->username)->value('username');
        if($username){
            $password = User::where('username',$username)->value('password');
            if(Hash::check($request->password, $password)){
                $userrole = User::where('username',$request->username)->value('role');
                if($userrole=="user"){
                    $request->session()->put('usersession',bcrypt($username.$request->password));
                    $request->session()->put('userloginsessiondata',$username);
                }else{
                    $request->session()->put('adminsession',bcrypt($username.$request->password));
                    $request->session()->put('adminloginsessiondata',$username);
                }
                // return $userrole;
                $notification = array(
                    'user' => $userrole,
                    'message' => "Successfully Logedin!",
                    'alert' => 'success'
                );
                return $notification;
            }else{
                $notification = array(
                    'message' => "Password invalid",
                    'alert' => 'error'
                );
                return $notification;
            }
        }else{
            $notification = array(
                'message' => "Username invalid",
                'alert' => 'error'
            );
            return $notification;
        }
 
    }
}
