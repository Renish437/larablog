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
     public function getImageAttribute(): string // You can also name it getFeaturedThumbnailUrlAttribute for clarity
    {
        if ($this->featured_image) {
            // $this->featured_image stores something like 'posts/imagename.jpg'
            $filename = basename($this->featured_image);

            // Construct the path to the thumbnail
            // This must match exactly where your `createThumbnail` method saves them.
            $thumbnailPath = 'posts/thumbnails/thumb_' . $filename;

            // Use asset() to generate the full URL, assuming files are in public/storage
            // (which is linked from storage/app/public)
            return asset('storage/' . $thumbnailPath);
        }

        // Optional: Return a path to a default placeholder image if no featured image exists
        return asset('images/default-placeholder.png'); // Make sure this placeholder image exists in public/images
    }

    // If you also want to easily get the original image URL:
    public function getOriginalImageUrlAttribute(): string
    {
        if ($this->featured_image) {
            return asset('storage/' . $this->featured_image);
        }
        return asset('images/default-placeholder.png');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
//     public static function search($search)
// {
//     return empty($search) ? static::query() : static::query()
//         ->where('title', 'like', '%' . $search . '%')
//         ->orWhere('content', 'like', '%' . $search . '%');
// }
public static function search($search)
{
    return empty($search) ? static::query() : static::query()
        ->where('title', 'like', '%' . $search . '%')
        ->orWhere('content', 'like', '%' . $search . '%')
        ->orWhere('tags', 'like', '%' . $search . '%');}
}
