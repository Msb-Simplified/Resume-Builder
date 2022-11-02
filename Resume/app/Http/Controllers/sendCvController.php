<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session as FacadesSession;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Education;
use App\Models\Experence;
use App\Models\Resume;
use App\Models\Setting;
use Illuminate\Support\Facades\Redirect;

class sendCvController extends Controller
{
    public function storeandsend(Request $request)
    {

        if (!FacadesSession::get('usersession')) {
            return view('404');
            die();
        } else {

            $users = User::where('username', FacadesSession::get('userloginsessiondata'))->first();
            $cvdata = Resume::where('user_id', $users->id)->first();

            if ($cvdata) {
                $userdata = User::where('username', FacadesSession::get('userloginsessiondata'))
                    ->with('userhasmanycvrelation')
                    ->first();

                $skilldata = "";
                $pdfName = 'Asset/pdfFolder/' . $userdata->id . '.pdf';
                
                if ($userdata->userhasmanycvrelation[0]->skill != NULL) {
                    $skilldata = Skill::where('resume_id', $userdata->userhasmanycvrelation[0]->id)->get();
                }

                // By default seeting data set when CVMAKE page is open first time
                $count = Setting::where('resume_id', $userdata->userhasmanycvrelation[0]->id)->count();
                if ($count < 1) {
                    Setting::insert([
                        'resume_id'  =>  $userdata->userhasmanycvrelation[0]->id
                    ]);
                }

                // Get Settings data
                $settings = Setting::where('resume_id', $userdata->userhasmanycvrelation[0]->id)
                    ->get();

                // Get accounts data
                $accounts = Account::where('resume_id', $userdata->userhasmanycvrelation[0]->id)
                    ->get();


                // Get accounts data
                $educations = Education::where('resume_id', $userdata->userhasmanycvrelation[0]->id)
                    ->get();

                // Get accounts data
                $experence = Experence::where('resume_id', $userdata->userhasmanycvrelation[0]->id)
                    ->get();



                $path = public_path() . '/Asset/user/' . $userdata->userhasmanycvrelation[0]->image;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $profileimage = 'data:image/' . $type . ';base64,' . base64_encode($data);

                $path = public_path() . '/Asset/icon/remove.png';
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $lineimage = 'data:image/' . $type . ';base64,' . base64_encode($data);

                // Save CV
                Pdf::loadView('pdf', ['userdata' => $userdata, 'skilldata' => $skilldata, 'settings' => $settings, 'educations' => $educations, 'experence' => $experence, 'accounts' => $accounts, 'lineimage' => $lineimage, 'profileimage' => $profileimage])->save(public_path($pdfName));


                // Compact every array, in a singale array. Because laravel mail only accept one data.
                $viewdata["userdata"] = $userdata;
                $viewdata["skilldata"] = $skilldata;
                $viewdata["settings"] = $settings;
                $viewdata["educations"] = $educations;
                $viewdata["experence"] = $experence;
                $viewdata["accounts"] = $accounts;
                $viewdata["lineimage"] = $lineimage;
                $viewdata["profileimage"] = $profileimage;


                $files = [
                    public_path('Asset/pdfFolder/'.$userdata->id.'.pdf')
                ];

                Mail::send('mailview',['viewdata' => $viewdata], function($message)use($request,$files) {
                    $message->to($request->sendingaddress, $request->sendingaddress)
                             ->subject($request->sendingaddress." Resume");

                            foreach ($files as $file) {
                                $message->attach($file);
                            }
    
                });


                
                $notification = array(
                    'message' => $userdata->id.'.pdf',
                    'type' => 'success'
                );
                return Redirect::to('/')->with($notification);
 
            } else {
                $notification = array(
                    'message' => 'First create your CV',
                    'alert-type' => 'error'
                );
                return Redirect::to('/')->with($notification);

            }

        }
    }
}
