<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get(); // Get all posts as collection

        return view('posts.index', ['posts' => $posts]); // View with posts collection passed in
    }

    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);

        $request->user()->posts()->create($request->only('body')); // Create post

        return back()->with('body', $request->body); // Return with post content
    }
}
