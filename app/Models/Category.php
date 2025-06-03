<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    //
    use Sluggable;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'parent_category_id',
        'ordering',
    ];
    public function parentCategory(){
        return $this->belongsTo(ParentCategory::class);
    }
     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
