<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $fillable = ['name','bg_color'];
    
    public function posts(){
        return $this->belongsToMany(Post::class,'post_tag');
    }
}
