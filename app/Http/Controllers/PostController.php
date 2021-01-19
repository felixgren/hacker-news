<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $test;

    public function __construct()
    {
        $this->test = "hey im working loool";
        $this->middleware(['auth'])->only(['store']);
    }

    public function index()
    {
        $posts = Post::with(['user', 'likes'])->orderByDesc('created_at')->paginate(15); // Get 5 posts in LengthAwarePaginator as a collection
        $singlePost = "NOPE";
        return view('posts.index', ['posts' => $posts, 'test' => $this->test, 'singlePost' => $singlePost]); // View with posts collection passed in
    }

    public function show(Post $post)
    {
        $singlePost = True;

        return view('posts.show', [
            'post' => $post,
            'singlePost' => $singlePost,
            'test' => $this->test
        ]);
    }

    public function store(PostRequest $request)
    {
        // $this->validate($request, ['body' => 'required']);

        // dd($request->only('body'));

        // $request->user()->posts()->create($request->only('body')); // Create post

        $request->user()->posts()->create([
            'title' => $request->title,
            'link' => $request->link,
            'body' => $request->body,
        ]);

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
