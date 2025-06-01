<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class ParentCategory extends Model
{
    //
    use Sluggable;
    
    protected $table = 'parent_categories';

    protected $fillable = [
        'name',
        'slug',
        'ordering',
    ];
     public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
