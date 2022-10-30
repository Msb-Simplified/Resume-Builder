<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Resume;
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

    public function accountDelete(Request $request){
        $res = Account::where('id',$request->id)->delete();
        if($res){
            $response = $this->loadAccountsData($request->cvid);
            return $response;
        }
    }
}
