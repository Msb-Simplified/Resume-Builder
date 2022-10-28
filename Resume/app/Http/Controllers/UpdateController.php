<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
}
