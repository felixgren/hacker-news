<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function index(User $user)
    {
        // Grab user
        // Show list of their posts and info
        // dd($user);
        return view('users.posts.index', [
            'user' => $user,
        ]);
    }
}
