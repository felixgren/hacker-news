<?php

namespace App\Models;

use App\Models\Like;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'link',
        'body',
    ];

    public function likedBy(User $user)
    {
        // It's possible to access likes relationship & model internally. 
        // We retrieve the likes collection
        // `Contains` method functions as truth test, checks if user id exists within likes collection.
        // Returns true if match is found, false if not.
        return $this->likes->contains('user_id', $user->id);
    }

    public function user()
    {
        // We want to be able to access user information when iterating our posts
        // We can use belongsTo method to define user in post model.
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        // Create relationship between Like & Post models. Connects & makes accessible
        // Many to many relationship would also be possible. 
        return $this->hasMany(Like::class);
    }
}
