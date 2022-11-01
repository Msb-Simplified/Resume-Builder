<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Education;
use App\Models\Experence;
use App\Models\Resume;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class UpdateController extends Controller
{
    public function updateImage(Request $request)
    {
    
        $resume = Resume::find($request->cvid);

        if($request->hasfile('file'))
        {
            $destination = 'Asset/user/'.$resume->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = $request->userid . '.' . $extention;
            $file->move('Asset/user/', $filename);
            $resume->image = $filename;
        }
        $resume->save();

        $notification = array(
            'message' => 'Image updated',
            'alert' => 'success'
        );
        return $notification;


    }
    public function updateName(Request $request){
        // $products = json_decode($request, true);
        
        $resume = Resume::find($request->cvid);

        if($request->name !="") $resume->name = $request->name;
        if($request->title !="") $resume->title = $request->title;


        if($request->aboutfield !=""){
            sleep(1);
            $resume->about = $request->aboutfield;
        }

        $saved =  $resume->save();
        if($saved){
            $notification = array(
                'message' => 'Updated',
                'alert' => 'success'
            );
            return $notification;
        }else{
            
            $notification = array(
                'message' => 'Check yoyr network connection',
                'alert-type' => 'error'
            );
            return Redirect::to('/')->with($notification);
        }

    }
    public function updateAbout(Request $request){
        // $products = json_decode($request, true);
        
        $resume = Resume::find($request->cvid);
        if($request->aboutfield !=""){
            sleep(1);
            $resume->about = $request->aboutfield;

        }else if($request->addressfield !=""){
            sleep(1);
            $resume->address = $request->addressfield;
        }
        else{
            $notification = array(
                'message' => 'Please insert carefully !',
                'type' => 'error'
            );
            return Redirect::to('/')->with($notification);
        }


        $saved =  $resume->save();
        if($saved){
            $notification = array(
                'message' => 'Field Updated',
                'type' => 'success'
            );
            return Redirect::to('/')->with($notification);
        }


    }
    public function get($cvid){
        $resume = Resume::find($cvid);
        return response()->json($resume);
    }

    public function loadAccountsData($cvid){
        $accounts = Account::where('resume_id',$cvid)->get();
        return response()->json($accounts);
    }
    public function loadEducation($cvid){
        $accounts = Education::where('resume_id',$cvid)->get();
        return response()->json($accounts);
    }

    public function accountDelete(Request $request){
        $res = Account::where('id',$request->id)->delete();
        if($res){
            $response = $this->loadAccountsData($request->cvid);
            return $response;
        }
    }

    public function updateAccount(Request $request){

        $accounts = Account::find($request->id);
        $accounts->accountname = $request->accountname;
        $accounts->accounthandler = $request->accounthandler;
        $saved =  $accounts->save();
        if($saved){
            $response = $this->loadAccountsData($request->cvid);
            return $response;
        }else{
            
            $notification = array(
                'message' => 'Check yoyr network connection',
                'alert-type' => 'error'
            );
            return Redirect::to('/')->with($notification);
        }

    }

    public function addAccount(Request $request){
        $Account = new Account();
        $Account->resume_id = $request->cvid;
        $Account->accountname = $request->accountname;
        $Account->accounthandler = $request->accounthandler;
        $Account->save();
        if($Account){
            $response = $this->loadAccountsData($request->cvid);
            return $response;
        }
    }

    public function upadateLanguage(Request $request)
    {
        $resume = Resume::find($request->cvid);
        if($request->type =="tools"){
            $resume->tools = $request->tools;
        }else{
            $resume->language = $request->language;
        }
        $resume->save();

        $notification = array(
            'message' => 'Data updated',
            'alert' => 'success'
        );

        return $notification;
    }


    public function upadateEducation(Request $request){
        if($request->id !=""){
            $education = Education::find($request->id);
            $education->institution = $request->institution;
            $saved =  $education->save();
            if($saved){
                $notification = array(
                    'message' => 'Institution updated',
                    'alert' => 'success'
                );
                return $notification;
            }
        }else{
            $education = new Education();
            $education->resume_id = $request->cvid;
            $education->institution = $request->institutionField;
            $saved = $education->save();
            
            if($saved){
                $notification = array(
                    'message' => 'Education added successfully',
                    'type' => 'success'
                );
                return Redirect::to('/')->with($notification);
            }
        }
    }


    public function deleteEducation(Request $request){
        $res = Education::where('id',$request->id)->delete();
        if($res){
            $response = $this->loadEducation($request->cvid);
            return $response;
        }
    }


    public function loadExperence($cvid){
        $accounts = Experence::where('resume_id',$cvid)->get();
        return response()->json($accounts);
    }

    
    public function upadateEexperence(Request $request){
        if($request->id){
            $experence = Experence::find($request->id);
            $experence->experence = $request->experence;
            $saved =  $experence->save();
            if($saved){
                $notification = array(
                    'message' => 'Experence updated',
                    'alert' => 'success'
                );
                return $notification;
            }
        }else{
            $experence = new Experence();
            $experence->resume_id = $request->cvid;
            $experence->experence = $request->experence;
            $saved = $experence->save();
            if($saved){
                $response = $this->loadExperence($request->cvid);
                return $response;
            }
        }
    }
    public function deleteExperence(Request $request){
        $res = Experence::where('id',$request->id)->delete();
        if($res){
            $response = $this->loadExperence($request->cvid);
            return $response;
        }
    }

    public function loadSkills($cvid){
        $accounts = Skill::where('resume_id',$cvid)->get();
        return response()->json($accounts);
    }

    public function updateSkill(Request $request){
        if($request->id){
            $skill = Skill::find($request->id);
            $skill->subject = $request->skillname;
            $skill->percent = $request->skillPercent;
            $saved =  $skill->save();
        }
        if($saved){
            $response = $this->loadSkills($request->cvid);
            return $response;
        }
    }
    public function addSkill(Request $request){
        $skill = new Skill();
        $skill->resume_id = $request->cvid;
        $skill->subject = $request->skillname;
        $skill->percent = $request->skillpercent;
        $save  = $skill->save();
        if($save){
            $response = $this->loadSkills($request->cvid);
            return $response;
        }
    }

}
