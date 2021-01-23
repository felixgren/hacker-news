<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function update(User $user, Post $post)
    {
        // Compare defined post model user to current post
        return $user->id === intval($post->user_id);
    }

    // public function comment(User $user, Post $post)
    // {
    //     if ($user->id == $this->user->)

    // }
}
