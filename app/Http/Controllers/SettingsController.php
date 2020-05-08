<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{


    public function index(){
        ////note
      // return view('setting','settings',Setting::first());
       return view('settings.edit')->with('setting',Setting::first());

    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required'
        ]);
        $setting=Setting::first();

        $setting->site_name =$request->name;
        $setting->email =$request->email;
        $setting->phone =$request->phone;
        $setting->address =$request->address;
        $setting->save();

        return redirect()->back();


    }
}
