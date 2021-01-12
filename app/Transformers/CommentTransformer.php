<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Comment;
use League\Fractal\TransformerAbstract;

// In fractals we use transformers to define how to output data
// Transformers can be either callbacks or classes, classes are recommended for reusability
class CommentTransformer extends TransformerAbstract
{
    public function transform(Comment $comment)
    {
        return [
            'id' => $comment->id,
            'user_id' => $comment->user_id,
            'body' => $comment->body,
            'body' => $comment->body,
        ];
    }
}
