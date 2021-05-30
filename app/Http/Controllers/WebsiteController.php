<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
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


    public function home(){
        $posts = Post::where('status',1)->paginate(5);
        $sliders = Post::where([
            ['status', '=', '1'],
            ['featured', '=', '1']
        ])->get();
        return view('frontend.home',compact('posts','sliders'));
    }

    public function post(post $post){
        return view('frontend.post',compact('post'));
    }

    public function category(category $category)
    {

        $posts = $category->posts();
        return view('frontend.category',compact('posts','category'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function search(Request $request){
        $keywords = $request->keywords;
        $results = post::whereRaw('MATCH (keywords) AGAINST (?)' , $keywords)->get();
        return view('frontend.search',compact('results','keywords'));
    }
}
