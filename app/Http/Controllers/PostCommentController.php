<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Transformers\CommentTransformer;

class PostCommentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['create']);
    }

    public function index(Post $post)
    {
        return response()->json(
            fractal()->collection($post->comments()->latest()->get())
                ->parseIncludes(['replies', 'user', 'replies.user'])
                ->transformWith(new CommentTransformer)
                ->toArray()

        );
    }

    public function create(CommentRequest $request, Post $post)
    {
        $comment = $post->comments()->create([
            'body' => $request->body,
            'reply_id' => $request->get('reply_id', null),
            'user_id' => $request->user()->id,
        ]);

        return response()->json(
            fractal()->item($comment)
                ->parseIncludes(['user'])
                ->transformWith(new CommentTransformer)
                ->toArray()
        );
    }
}
