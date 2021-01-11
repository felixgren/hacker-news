<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserUpdateRequest;
use App\Jobs\UploadImage;

class DashboardController extends Controller
{
    public function __construct() // Construct method is called on each created object
    {
        $this->middleware(['auth']); // Redirect to login if not authenticated
    }

    public function index(User $user)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $posts = $user->posts()->with(['user', 'likes'])->orderByDesc('created_at')->paginate(20);

        // $posts = Auth::user()->posts()->with(['user', 'likes'])->orderByDesc('created_at')->paginate(15);

        return view('dashboard', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {

        // Any additional authorization required here?

        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->description = $request->description;

        $user->save();

        if ($request->file('image')) {
            $request->file('image')->move(storage_path() . '/uploads', $fileId = uniqid(true));

            $this->dispatch(new UploadImage($user, $fileId));
        }

        return back()->with('status', 'Profile successfully updated!');
    }
}
