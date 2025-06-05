<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    //
    public function __construct(Request $request)
    {
          $setting = \App\Models\GeneralSetting::first();

          $navigations_html = '';
          // With dropdown
          $pcategories = ParentCategory::whereHas('categories',function($query){
              $query->whereHas('posts');
          })->orderBy('name','ASC')->get();

          // Without dropdown
          $categories = Category::whereHas('posts')->where('parent_category_id',0)->orderBy('name','ASC')->get();

           $posts = Post::where('visibility',1)->with('category')->orderBy('created_at','DESC')->get();
          
           $authors = User::whereHas('posts')->with('posts')->get();
          View::share([
            'setting' => $setting,
            'pcategories' => $pcategories,
            'categories' => $categories,
            'posts' => $posts,
            'authors'=>$authors
          ]);
        
    }
}
