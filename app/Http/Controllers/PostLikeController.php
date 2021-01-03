<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Post $post, Request $request) // We want to get post_id in here so we can like it
    {
        if ($post->likedBy($request->user())) {
            abort(403);
        }

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }
}
