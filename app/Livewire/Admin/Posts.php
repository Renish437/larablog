<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use App\Models\ParentCategory;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{use WithPagination;
    public $perPage = 5;
    public $categories_html;


    public $search=null;
    public $author=null;
    public $category=null;
    public $visibility=null;
    public $post_visibility;
    public $sortBy = 'desc';

    protected $queryString=[
        'search' => ['except' => ''],
        'author' => ['except' => ''],
        'category' => ['except' => ''],
        'visibility' => ['except' => ''],
        'sortBy' => ['except' => ''],
    ];
    protected $listeners = [
        'performDeletePost'
    ];

    public function updatedSearch(){
        $this->resetPage();
    }
    public function updatedAuthor(){
        $this->resetPage();
    }
    public function updatedCategory(){
        $this->resetPage();
    }
    public function updatedVisibility(){

        $this->resetPage();
        $this->post_visibility = $this->visibility == 'public' ?1 : 0;
    }

    public function mount(){
          $this->post_visibility = $this->visibility == 'public' ? 1 : 0;
        $this->categories_html = '';
        $pcategories = ParentCategory::whereHas('categories',function($query){
            $query->whereHas('posts');
        })->orderBy('name','ASC')->get();
        $categories = Category::whereHas('posts')->where('parent_category_id',0)->orderBy('name','ASC')->get();

        if(count($pcategories)>0){
            foreach($pcategories as $pcategory){
                $this->categories_html .= '<optgroup label="'.$pcategory->name.'">';
                foreach($pcategory->categories as $category){
                    $this->categories_html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
                }
                $this->categories_html .= '</optgroup>';
            }
        }
        if(count($categories)>0){   
            foreach($categories as $category){
                $this->categories_html .= '<option value="'.$category->id.'">'.$category->name.'</option>';
            }
        }
       
    }



    public function render()
    {
        return view('livewire.admin.posts',[
            'posts' => Auth::user()->type=="superAdmin" ?
            Post::search(trim($this->search))
            ->when($this->author, function ($query) {
                $query->where('user_id', $this->author);
            })
            ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->visibility, function ($query) {
               $query->where('visibility', $this->post_visibility);
            })
            ->when($this->sortBy, function ($query) {
                $query->orderBy('created_at', $this->sortBy);
            })
          
            ->orderBy('created_at','DESC')
            ->paginate($this->perPage):
            Post::search(trim($this->search))
              ->when($this->category, function ($query) {
                $query->where('category_id', $this->category);
            })
            ->when($this->visibility, function ($query) {
               $query->where('visibility', $this->post_visibility);
            })
            ->when($this->sortBy, function ($query) {
               $query->orderBy('created_at', $this->sortBy);
            })
            ->where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->paginate($this->perPage),
            'authors'=>User::whereHas('posts')->get(),
            
        ]);
    }
    public function deletePost($id){
       $this->dispatch('deletePost', $id);
    }
    public function performDeletePost($id){
       $post= Post::findOrFail($id);
       $post->delete();
      $this->dispatch('toastMagic',status: 'success',title: 'Post Deleted Successfully',options: ['showCloseBtn' => true,'progressBar' => true,'backdrop' => true,'positionClass' => 'toast-top-left',]);
    }
}
