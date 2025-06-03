<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function addPost(Request $request){
    $categories_html ='';
    $pcategories = ParentCategory::whereHas('categories')->orderBy('name','ASC')->get();
    $categories = Category::where('parent_category_id',0)->orderBy('name','ASC')->get();

    if(count($pcategories)>0){
        foreach($pcategories as $pcategory){
            $categories_html .= '<optgroup label="'.$pcategory->name.'">';
            foreach($pcategory->categories as $category){
                $categories_html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
            $categories_html .= '</optgroup>';
        }
    }
    if(count($categories)>0){
        foreach($categories as $category){
            $categories_html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
        }
    }
  
  
    return view('back.pages.post.add',compact('pcategories','categories','categories_html'));
    }
    public function postsView(){
     $posts = Post::where('user_id',Auth::user()->id)->with('category')->orderBy('created_at','DESC')->get();
     return view('back.pages.post.index',compact('posts'));
    }
}
