<?php

namespace App\Http\Controllers;


use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $favicon = setting::where('name', 'favicon')->first();
        $email = setting::where('name', 'email')->first();
        $mobile = setting::where('name', 'mobile')->first();
        $whatsapp = setting::where('name', 'whatsapp')->first();
        $facebook = setting::where('name', 'facebook')->first();
        $linkedin = setting::where('name', 'linkedin')->first();

        return view('admin.settings.setting',compact('logo_dark','footer_text','facebook','logo_light','favicon','email','whatsapp','linkedin','mobile','github','custom_css','address','map'));

    }

    public function store(Request $request)
    {
            $this->validate($request,[
                'logo_light' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'logo_dark' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
                'logo_favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048',
            ]);

            if($request->hasFile('logo_light'))
            {
                $logo_light = setting::where('name','logo_light')->first();

                $current_image = 'storage/files/setting/'.substr($logo_light->value,22);

                //delete old banner first
                if(file_exists($current_image))
                {
                    unlink($current_image);
                }
                $logo_light->value = $request->logo_light->store('public/files/setting');
                $logo_light->save();
            }

            if($request->hasFile('logo_dark'))
            {
                $logo_dark = setting::where('name','logo_dark')->first();

                $current_image = 'storage/files/setting/'.substr($logo_dark->value,22);

                //delete old banner first
                if(file_exists($current_image))
                {
                    unlink($current_image);
                }
                $logo_dark->value = $request->logo_dark->store('public/files/setting');
                $logo_dark->save();
            }

            if($request->hasFile('favicon'))
            {
                $favicon = setting::where('name','favicon')->first();

                $current_image = 'storage/files/setting/'.substr($favicon->value,22);

                //delete old banner first
                if(file_exists($current_image))
                {
                    unlink($current_image);
                }
                $favicon->value = $request->favicon->store('public/files/setting');
                $favicon->save();
            }

            $email = setting::where('name','email')->first();
            $email->value = $request->email;
            $email->save();

            $mobile = setting::where('name','mobile')->first();
            $mobile->value = $request->mobile;
            $mobile->save();

            $whatsapp = setting::where('name','whatsapp')->first();
            $whatsapp->value = $request->whatsapp;
            $whatsapp->save();

            $facebook = setting::where('name','facebook')->first();
            $facebook->value = $request->facebook;
            $facebook->save();

            $linkedin = setting::where('name','linkedin')->first();
            $linkedin->value = $request->linkedin;
            $linkedin->save();

            $github = setting::where('name','github')->first();
            $github->value = $request->github;
            $github->save();

            $custom_css = setting::where('name','custom_css')->first();
            $custom_css->value = $request->custom_css;
            $custom_css->save();

            $footer_text = setting::where('name','footer_text')->first();
            $footer_text->value = $request->footer_text;
            $footer_text->save();

            $address = setting::where('name','address')->first();
            $address->value = $request->address;
            $address->save();

            $map = setting::where('name','map')->first();
            $map->value = $request->map;
            $map->save();

            return redirect()->back()->with('success','setting updated successfully');
    }
}
