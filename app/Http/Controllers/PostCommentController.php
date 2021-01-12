<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Transformers\CommentTransformer;

class PostCommentController extends Controller
{
    public function index(Post $post)
    {
        return response()->json(
            fractal()->collection($post->comments()->latest()->get())
                ->parseIncludes(['replies', 'user', 'replies.user'])
                ->transformWith(new CommentTransformer)
                ->toArray()

        );
    }
}
