<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {
        $posts = Post::with(['user', 'likes'])->orderByDesc('created_at')->paginate(15); // Get 5 posts in LengthAwarePaginator as a collection
        return view('posts.index', ['posts' => $posts]); // View with posts collection passed in
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        $request->user()->posts()->create($request->only('body')); // Create post

        return back()->with('body', $request->body); // Return with post content
    }

    public function edit(Post $post, Request $request)
    {
        $this->authorize('update', $post); // Protect backend
        $this->validate($request, ['body' => 'required']); // Require text

        $post->body = $request->body;

        $post->save();

        return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->delete();

        return back();
    }
}
