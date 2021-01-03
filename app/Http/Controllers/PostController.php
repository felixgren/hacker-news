<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'likes'])->orderByDesc('created_at')->paginate(15); // Get 5 posts in LengthAwarePaginator as a collection
        return view('posts.index', ['posts' => $posts]); // View with posts collection passed in
    }

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        $request->user()->posts()->create($request->only('body')); // Create post

        return back()->with('body', $request->body); // Return with post content
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back();
    }
}
