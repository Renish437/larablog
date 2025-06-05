<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomeController extends BaseController
{
    //
    public function index()
    {
        $setting = \App\Models\GeneralSetting::first();
        $title = isset($setting->site_title)? $setting->site_title : '';
        $description = isset($setting->site_meta_description)?$setting->site_meta_description : '';
        $imageURL = isset($setting->site_logo)? asset(Storage::url($setting->site_logo)):'';
        $keywords = isset($setting->site_meta_keywords) ? $setting->site_meta_keywords : '';
        $currentUrl = url()->current();
       // Meta Seo
        SEOTools::setTitle($title,'Home');
        SEOTools::setDescription($description);
        SEOMeta::setKeywords($keywords);

        SEOTools::opengraph()->setUrl($currentUrl);
        SEOTools::opengraph()->addImage($imageURL);
        SEOTools::opengraph()->addProperty('type', 'articles');

        SEOTools::twitter()->setImage($imageURL);
        SEOTools::twitter()->setUrl($currentUrl);
        SEOTools::twitter()->setSite('@liveblog');


       
         $hero_item_one = Post::where('visibility',1)->latest()->first();
         $hero_items = Post::where('visibility',1)->latest()->skip(1)->take(4)->get();
         $posts = Post::where('visibility',1)->get();
      

        return view('front.pages.home',compact('hero_item_one','hero_items','posts'));
    }
    public function my_home()
    {
        return view('front.pages.my-home');
    }
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        return view('front.pages.category',compact('category'));
    }
    public function aboutUs()
    {
        return view('front.pages.about-us');
    }
    public function author()
    {
        return view('front.pages.author');
    }
    public function search()
    {
        return view('front.pages.searched-page');
    }
    public function blogs()
    {
   
        return view('front.pages.blogs');
    }
    public function blog($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('front.pages.blog',compact('post'));
    }
    public function notFound(){
        return view('front.pages.not-found');
    }
    public function contact(){
        return view('front.pages.contact');
    }
    public function privacyPolicy(){
        return view('front.pages.privacy-policy');
    }
}
