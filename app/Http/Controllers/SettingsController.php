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

        $email = setting::where('name', 'email')->first();
        $mobile = setting::where('name', 'mobile')->first();
        $whatsapp = setting::where('name', 'whatsapp')->first();
        $facebook = setting::where('name', 'facebook')->first();
        $linkedin = setting::where('name', 'linkedin')->first();
        $twitter = setting::where('name', 'twitter')->first();
        $instagram = setting::where('name', 'instagram')->first();
        $about_text = setting::where('name', 'about_text')->first();
        $about_image = setting::where('name', 'about_image')->first();

        return view('admin.settings.setting',compact('email','mobile','whatsapp','facebook','linkedin','twitter','instagram','about_text','about_image'));

    }

    public function store(Request $request)
    {
            $this->validate($request,[
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5048'

            ]);

            if($request->hasFile('image'))
            {
                $about_image = setting::where('name','about_image')->first();

                $about_image->value = $request->image->store('public/files/setting');
                $about_image->save();
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

            $twitter = setting::where('name','twitter')->first();
            $twitter->value = $request->twitter;
            $twitter->save();

            $about_text = setting::where('name','about_text')->first();
            $about_text->value = $request->about_text;
            $about_text->save();

            $instagram = setting::where('name','instagram')->first();
            $instagram->value = $request->instagram;
            $instagram->save();


            return redirect()->back()->with('success','setting updated successfully');
    }
}
