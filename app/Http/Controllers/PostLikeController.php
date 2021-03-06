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

    public function destroy(Post $post, Request $request)
    {
        // Retrieve user likes, check if match, if true delete like
        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
