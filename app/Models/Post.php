<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
     use Sluggable;

        

            protected $fillable = [
                'content',
                'title',
                'user_id',
                'category_id',
                'slug',
                'tags',
                'featured_image',
                'meta_keywords',
                'meta_description',
                'visibility',
            ];
            public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getImageUrl($post)
    {
    $original = asset('storage/' . $post->featured_image); 
    $filename = basename($post->featured_image);
    $thumbnail = asset('storage/posts/thumbnails/thumb_' . $filename);
    return $thumbnail;
    }
}
