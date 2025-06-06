<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialLink extends Model
{
    //
    protected $table = 'user_social_links';

    protected $fillable = [
        'user_id',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'linkedin',
        'github',
    ];
 
}
