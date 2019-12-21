<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Servic;
use App\Synergy;
use App\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        return var_dump(intval(Auth::user()->who));
        return view('pages.index')
            ->with('synergy', Synergy::first())
            ->with('services', Servic::all());
    }

    public function services($url){

        $service = Servic::where('live_url', $url)->first();
        if(!empty($service)){
            return view('pages.services.services')
                ->with('synergy', Synergy::first())
                ->with('service', $service);
        }else{
            return back();
        }

    }

    public function adminlogin(){
        return view('admin.auth.login');
    }

    public function blog(){
        return view('pages.blog.index')
            ->with('synergy', Synergy::first())
            ->with('articles', Blog::where('status', true)->paginate(12));
    }

    public function blogShow($slug){
        $article = Blog::where('slug' , $slug)->where('status', true)->first();
        if(!empty($article)){
            return view('pages.blog.article')
                ->with('synergy', Synergy::first())
                ->with('title', $article->title)
                ->with('description', $article->desc)
                ->with('article', $article);
        }else{
            return back();
        }
    }

    public function blogTag($tag){
        return view('pages.blog.tag')
            ->with('synergy', Synergy::first())
            ->with('tag', $tag)
            ->with('articles', Blog::where('status', true)->where('tags','like',  "%{$tag}%" )->paginate(12));
    }

    public function quotes(){
        return view('pages.quote.quote')
            ->with('synergy', Synergy::first());
    }
}
