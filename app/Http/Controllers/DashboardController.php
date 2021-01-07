<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct() // Construct method is called on each created object
    {
        $this->middleware(['auth']); // Redirect to login if not authenticated
    }

    public function index(User $user)
    {
        $user = Auth::user();
        $posts = $user->posts()->with(['user', 'likes'])->paginate(20);
        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function update(User $user)
    {
        dd($user);
    }
}
