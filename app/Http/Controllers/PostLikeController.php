<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request) // We want to get post_id in here so we can like it
    {
        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
