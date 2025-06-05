<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ParentCategory;
use App\Models\Post;

class BlogCategorySection extends Component
{
    public $selectedCategory = 'All';

    public function render()
    {
        // Get parent categories with posts (already shared by BaseController, but we can access directly if needed)
        $pcategories = ParentCategory::whereHas('categories', function ($query) {
            $query->whereHas('posts');
        })->orderBy('name', 'ASC')->get();

        // Get all posts for the 'All' tab
        $allPosts = Post::where('visibility', 1)
            ->with('category')
            ->orderBy('created_at', 'DESC')
            ->get();

        // Prepare posts for each parent category
        $postsByCategory = [];
        foreach ($pcategories as $pcategory) {
            $postsByCategory[$pcategory->id] = Post::where('visibility', 1)
                ->whereHas('category', function ($query) use ($pcategory) {
                    $query->where('parent_category_id', $pcategory->id);
                })
                ->with('category')
                ->orderBy('created_at', 'DESC')
                ->get();
        }

        return view('livewire.blog-category-section', [
            'pcategories' => $pcategories,
            'allPosts' => $allPosts,
            'postsByCategory' => $postsByCategory,
        ]);
    }
}