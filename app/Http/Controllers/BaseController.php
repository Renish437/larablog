<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use Illuminate\Http\Request;
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

  

          View::share([
            'setting' => $setting,
            'pcategories' => $pcategories,
            'categories' => $categories
          ]);
        
    }
}
