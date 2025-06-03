<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function editPost(Post $post){

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
                $selected = $category->id == $post->category_id ? 'selected' : '';
                $categories_html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
        }
        if($post->category_id == null){
            $post->category_id = 0;
        }
        return view('back.pages.post.edit',compact('post','categories_html'));
    }
  public function uploadFroalaImage(Request $request)
    {
        try {
            // Validate the uploaded file
            $request->validate([
                'file' => 'required|image|mimes:jpeg,png,gif|max:5120', // 5MB max
            ]);

            // Store the image in the 'public' disk
            $path = $request->file('file')->store('froala_images', 'public');

            // Generate the full URL for the stored image
            $url = Storage::url($path);

            // Return the response in the format Froala expects
            return response()->json(['link' => $url], 200);
        } catch (\Exception $e) {
            // Return error response for Froala
            return response()->json([
                'error' => [
                    'code' => 3,
                    'message' => 'Error during file upload: ' . $e->getMessage()
                ]
            ], 500);
        }
    }
}
