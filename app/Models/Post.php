<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
