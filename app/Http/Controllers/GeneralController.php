<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General;

class GeneralController extends Controller
{
    public function dashboard(){
        return view ('admin.dashboard');
    }

    public function general(){
        $general = General::find(1);
        return view ('admin.general',[
            'general' => $general
        ]);
    }

    public function generalUpdate(Request $request)
    {
        \Validator::make($request->all(), [
     
            "title" => "required",
            "address1" => "required",
            "phone" => "required" ,
            "email" => "required",
            "footer" => "required",
            "gmaps" => "required"       
        ])->validate();

        $general = General::find(1);
        $general->title = $request->title;
        $general->address1 = $request->address1;
        $general->address2 = $request->address2;
        $general->phone = $request->phone;
        $general->email = $request->email;
        $general->twitter = $request->twitter;
        $general->facebook = $request->facebook;
        $general->instagram = $request->instagram;
        $general->linkedin = $request->linkedin;
        $general->footer = $request->footer;
        $general->gmaps = $request->gmaps;
        $general->tawkto = $request->tawkto;
        $general->disqus = $request->disqus;
        $general->sharethis = $request->sharethis;
        $general->gverification = $request->gverification;
        $general->keyword = $request->keyword;
        $general->meta_desc = $request->meta_desc;

        $new_logo = $request->file('logo');

        if($new_logo){
        if($general->logo && file_exists(storage_path('app/public/' . $general->logo))){
            \Storage::delete('public/'. $general->logo);
        }

        $new_cover_path = $new_logo->store('images/general', 'public');

        $general->logo = $new_cover_path;
        }

        $new_favicon = $request->file('favicon');

        if($new_favicon){
        if($general->favicon && file_exists(storage_path('app/public/' . $general->favicon))){
            \Storage::delete('public/'. $general->favicon);
        }

        $new_cover_path = $new_favicon->store('images/general', 'public');

        $general->favicon = $new_cover_path;
        }


        // dd($general);
        if ( $general->save()) {

            return redirect()->route('general')->with('success', 'General updated successfully');
    
           } else {
               
            return redirect()->route('general')->with('error', 'General failed to update');
    
           }
    }
}
