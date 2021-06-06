<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter;
use App\Models\Category;
use App\Models\Email;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;


class NewsletterController extends Controller
{
    //
    public function __construct()
    {

        View::share('email', setting::where('name','email')->first());
        View::share('mobile', setting::where('name','mobile')->first());
        View::share('whatsapp', setting::where('name','whatsapp')->first());
        View::share('twitter', setting::where('name','twitter')->first());
        View::share('facebook', setting::where('name','facebook')->first());
        View::share('linkedin', setting::where('name','linkedin')->first());
        View::share('instagram', setting::where('name','instagram')->first());
        View::share('whatsapp', setting::where('name','whatsapp')->first());
        View::share('about_text', setting::where('name','about_text')->first());
        View::share('about_image', setting::where('name','about_image')->first());
        View::share('categories', Category::all());

    }

    public function subscribe(Request $request){

        $this->validate($request,[
            'email'=>'required'
        ]);

        if(Email::where('email',$request->email)->first()){
            return redirect()->back()->with('subscribe','You are already subscribed');
        }
        else {

            $email = new Email();
            $email->email = $request->email;
            $hash = md5($email);
            $email->hash = $hash;
            $data = ['email' => $email, 'hash' => urlencode($hash)];
            $email->save();
            Mail::to($email)->send(new Newsletter($data));
            return redirect()->back()->with('subscribe', 'Please check your email to confirm subscription');

        }

    }

    public function confirm($hash){

        $email = Email::where('hash',urldecode($hash))->first();
        $email->status = 1;
        $email->save();
        $message = "Your subscription confirmation was successful";
        return view('frontend.success',compact('message'));

    }

    public function unsubscribe($hash){

        Email::where('hash',urldecode($hash))->delete();
        $message = "You have been unsubscribed";
        return view('frontend.success',compact('message'));

    }
}
