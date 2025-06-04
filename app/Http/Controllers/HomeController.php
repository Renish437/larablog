<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;

use Illuminate\Http\Request;

class HomeController extends BaseController
{
    //
    public function index()
    {
        return view('front.pages.home');
    }
    public function my_home()
    {
        return view('front.pages.my-home');
    }
    public function category()
    {
        return view('front.pages.category');
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
    public function blog()
    {
        return view('front.pages.blog');
    }
    public function notFound(){
        return view('front.pages.404');
    }
    public function contact(){
        return view('front.pages.contact');
    }
}
