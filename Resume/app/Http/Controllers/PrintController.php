<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Education;
use App\Models\Experence;
use App\Models\Resume;
use App\Models\Setting;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;

class PrintController extends Controller
{    
    
    public function print(Request $request,$username,$id){
        if(!FacadesSession::get('usersession')){
            return view('404');
            die();
        }else{
            
            $users = User::where('username', FacadesSession::get('userloginsessiondata'))->first();

            if($users){
                $cvdata = Resume::where('user_id', $users->id)->first();
                if ($cvdata){

                    $skilldata = "";
                $userdata = User::where('username',FacadesSession::get('userloginsessiondata'))
                ->with('userhasmanycvrelation')
                ->first();

                    if($userdata->userhasmanycvrelation[0]->skill != NULL){
                        $skilldata = Skill::where('resume_id',$userdata->userhasmanycvrelation[0]->id)
                        ->get();
                    }
                    
                    // By default seeting data set when CVMAKE page is open first time
                    $count = Setting::where('resume_id', $userdata->userhasmanycvrelation[0]->id)->count();
                    if($count < 1){
                        Setting::insert([
                            'resume_id'  =>  $userdata->userhasmanycvrelation[0]->id
                        ]);
                    }
        
                    // Get Settings data
                    $settings = Setting::where('resume_id',$userdata->userhasmanycvrelation[0]->id)
                    ->get();
                    
                    // Get accounts data
                    $accounts = Account::where('resume_id',$userdata->userhasmanycvrelation[0]->id)
                    ->get();
        
                    
                    // Get accounts data
                    $educations = Education::where('resume_id',$userdata->userhasmanycvrelation[0]->id)
                    ->get();
        
                    // Get accounts data
                    $experence = Experence::where('resume_id',$userdata->userhasmanycvrelation[0]->id)
                    ->get();
        
                    
        
                    $path = public_path().'/Asset/icon/remove.png';
                    $type = pathinfo($path,PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $lineimage = 'data:image/'.$type.';base64,'.base64_encode($data);


                    return view('user.print',compact('userdata','skilldata','settings','accounts','educations','experence'));
                }else{
                    return view('user.print',compact('userdata'));
                }
            }else{
                return view('user.home');
            }
        }
    }   
}
