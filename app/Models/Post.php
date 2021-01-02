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
        'body'
    ];

    // We want to be able to access user information when iterating our posts
    // We can use belongsTo method to define user in post model.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        // Create relationship between Like & Post models. Connects & makes accessible
        // Many to many relationship would also be possible. 
        return $this->hasMany(Like::class);
    }
}
