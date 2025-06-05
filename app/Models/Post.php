<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
              'thumbnail',
            ];
            public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function getReadingTime($content){
        $words = str_word_count($content);
        $minutes = ceil($words / 200);
        return $minutes;
    }
   // CORRECTED ACCESSOR FOR THE THUMBNAIL
   public function getThumbnailUrlAttribute(): string
    {
        if ($this->thumbnail && Storage::disk('public')->exists($this->thumbnail)) {
            return Storage::disk('public')->url($this->thumbnail);
        }

        return asset('images/default-placeholder.png');
    }
    // If you also want to easily get the original image URL:
    public function getImageAttribute(): string
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
  public function getImageThumbAttribute(): string
    {
        return $this->thumbnail; // Maintain compatibility with previous code
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
        ->orWhere('tags', 'like', '%' . $search . '%');
    }
    public function tags(){
        return $this->belongsToMany(Tag::class,'post_tag');
    }
}
