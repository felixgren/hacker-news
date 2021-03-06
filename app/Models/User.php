<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class); // Laravel automagically connects user_id from posts table with id from users table, could be specified otherwise. 
    }

    public function likes()
    {
        return $this->hasMany(Like::class); // Connect user to likes.
    }

    public function receivedLikes()
    {
        return $this->hasManyThrough(Like::class, Post::class);
    }

    public function getAvatar()
    {
        if (!$this->avatar_filename) {
            return config('hackernews.buckets.images') . '/avatar/default.png';
        }

        return config('hackernews.buckets.images') . '/avatar/' . $this->avatar_filename;
    }
}
