<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\UserStatus;
use App\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'picture',
        'bio',
        'type',
        'status'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status'=>UserStatus::class,
            'type'=>UserType::class
        ];
    }
public function getPictureAttribute($value)
{
    if ($value && Storage::disk('public')->exists($value)) {
        return Storage::url($value); // Returns http://.../storage/profile-photos/image.jpg
    }
    return 'https://placeholder.url/image.png'; // Returns a placeholder URL
}
public function social_links() // Or singular: social_link
{
    return $this->hasOne(UserSocialLink::class, 'user_id', 'id');
    // 'user_id' is the foreign key on the UserSocialLink table
    // 'id' is the local key on the User table
}
    
}
