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

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        $request->user()->posts()->create($request->only('body')); // Create post

        return back()->with('body', $request->body); // Return with post content
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return back();
    }

    public function edit(Post $post, Request $request)
    {
        // Auth against request & input
        // Get post
        // Edit with data from request.
        $request->body = "hello";
        $post->body = $request->body;

        $post->save();

        // $this->authorize('delete', $post);

        // dd($post->body);
        // $post->body()
        // update([$post->body => 'HELLO']);
        // $post->delete();

        return back();
    }
}
